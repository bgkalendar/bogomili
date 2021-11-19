<?php
$locale = "bg";
require_once('leto/api/Leto.php');
require_once('leto/api/LetoException.php');
require_once('leto/api/LetoExceptionUnrecoverable.php');
require_once('leto/api/LetoPeriod.php');
require_once('leto/api/LetoPeriodStructure.php');
require_once('leto/api/LetoPeriodType.php');
require_once('leto/base/LetoBase.php');
require_once('leto/base/LetoCorrectnessChecks.php');
require_once('leto/base/LetoPeriodBean.php');
require_once('leto/base/LetoPeriodStructureBean.php');
require_once('leto/base/LetoPeriodTypeBase.php');
require_once('leto/base/LetoPeriodTypeBean.php');
require_once('leto/impl/bogomil/LetoBogomilMonth.php');
require_once('leto/impl/bogomil/LetoBogomil.php');
require_once('leto/impl/gregorian/LetoGregorianMonth.php');
require_once('leto/impl/gregorian/LetoGregorianDayPeriodBc.php');
require_once('leto/impl/gregorian/LetoGregorianMonthPeriodBc.php');
require_once('leto/impl/gregorian/LetoGregorian.php');

$gr = new LetoGregorian();
$bg = new LetoBogomil();

$daysbgFromStartOfCalendarTillJavaEpoch = $bg->startOfCalendarInDaysBeforeJavaEpoch();
$daysgrFromStartOfCalendarTillJavaEpoch = $gr->startOfCalendarInDaysBeforeJavaEpoch();


$periodsbg = null;
$periodsgr = null;
$timezoneCorrection    = '7200'; // Two hours ahead of GMT in seconds.
$dailysavingCorrection = '0';//(1L * 60L * 60L * 1000L); // One hour ahead of usual winter time. 0 - means winter time.

$secundsFromJavaEpoch = bcadd(time(), bcadd($timezoneCorrection, $dailysavingCorrection)); // Two hour ahead of GMT
$secundsInDay = '86400';   // Seconds in a day.
$remainng = bcmod($secundsFromJavaEpoch, $secundsInDay);  // How much complete days have passed since EPOCH
$hour     = bcdiv($remainng, '3600', 0);
$remainng = bcmod($remainng, '3600');
$minute   = bcdiv($remainng, '60', 0);
$remainng = bcmod($remainng, '60');
$secund   = $remainng ;
$daysFromJavaEpoch = bcdiv($secundsFromJavaEpoch, $secundsInDay, 0);  // How much complete days have passed since EPOCH
$daysbgFromStartOfCalendar = bcadd($daysbgFromStartOfCalendarTillJavaEpoch, $daysFromJavaEpoch);
$daysgrFromStartOfCalendar = bcadd($daysgrFromStartOfCalendarTillJavaEpoch, $daysFromJavaEpoch);

$periodsbg = $bg->calculateCalendarPeriods($daysbgFromStartOfCalendar);
$periodsgr = $gr->calculateCalendarPeriods($daysgrFromStartOfCalendar);
$isbc = $gr->isBeforeChrist();
$bc = $isbc ? ' '.tri('пр.Хр.', 'B.C.', 'B.C.', 'до н.э.') : '';

if ($periodsbg == null || $periodsgr == null) {
   throw new LetoException("Calculation of current datae is not possible due to unknown reason. Please check for PHP syntax correctness.");
}
$daybg       = $periodsbg[0]->getNumber() + 1;
$daygr       = $periodsgr[0]->getNumber() + 1;
$monthbg     = $periodsbg[1]->getNumber();
$monthgr     = $periodsgr[1]->getNumber() + 1;
$monthNamebg = $periodsbg[1]->getStructure()->getName($locale);
$monthNamegr = $periodsgr[1]->getStructure()->getName($locale);
$yearbg      = $periodsbg[2]->getAbsoluteNumber() + 1;
$yeargr      = $periodsgr[2]->getAbsoluteNumber() + 1;

$isleapbg = $periodsbg[2]->getStructure()->getTotalLengthInDays() > 365;

?>
