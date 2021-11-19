<?php 

class LetoBogomil extends LetoBase {
    
    private $START_OF_CALENDAR_BEFORE_JAVA_EPOCH = 719167; // In days.
    
    

    private static $DAY                         = null;
    private static $DIRTYDAYS                   = null;
    private static $DIRTYDAYS_LEAP              = null;
    private static $YAR                         = null;
    private static $FIAR                        = null;
    private static $MAR                         = null;
    private static $RAR                         = null;
    private static $YUAR                        = null;
    private static $AVRAR                       = null;
    private static $SEVAR                       = null;
    private static $OKAR                        = null;
    private static $NOAR                        = null;
    private static $DEKAR                       = null;
    private static $YEAR                        = null; 
    private static $YEAR_LEAP                   = null;
    private static $YEARS_4                     = null; 
    private static $YEARS_4_LEAP                = null;
    private static $STAR_DAY                    = null;
    private static $STAR_DAY_LEAP               = null;
    private static $STAR_WEEK                   = null;
    private static $STAR_WEEK_LEAP              = null;
    private static $STAR_MONTH                  = null;
    private static $STAR_MONTH_LEAP             = null;
    private static $STAR_YEAR                   = null;
    private static $STAR_YEAR_LEAP              = null;
    private static $STAR_YEARS_4                = null;
    private static $STAR_YEARS_4_LEAP           = null;
    private static $STAR_YEARS_4x125            = null;
    private static $DAY_PERIOD_TYPE             = null;
    private static $MONTH_PERIOD_TYPE           = null;     
    private static $YEAR_PERIOD_TYPE            = null; 
    private static $YEARS_4_PERIOD_TYPE         = null;
    private static $STAR_DAY_PERIOD_TYPE        = null;    
    private static $STAR_WEEK_PERIOD_TYPE       = null;    
    private static $STAR_MONTH_PERIOD_TYPE      = null;    
    private static $STAR_YEAR_PERIOD_TYPE       = null;  
    private static $STAR_YEAR_4_PERIOD_TYPE     = null;     
    private static $STAR_YEAR_4x125_PERIOD_TYPE = null;       
    protected $TYPES = null;
    // -------------------------------------------------------------------------------------------//
    //                                 S T R U C T U R E S                                        //
    // -------------------------------------------------------------------------------------------//

    public function __construct() {
    
        $DAY = new LetoPeriodStructureBean(1, null);

        $DIRTYDAYS = 
            new LetoPeriodStructureBean(5, 
                array (
                    $DAY, $DAY, $DAY, $DAY, $DAY 
                )
            ); 

        $DIRTYDAYS_LEAP = 
            new LetoPeriodStructureBean(6, 
                array (
                    $DAY, $DAY, $DAY, $DAY, $DAY, $DAY
                )
            ); 

        $MONTH = 
            new LetoPeriodStructureBean(36, 
                array (
                    $DAY, $DAY, $DAY, $DAY, $DAY, $DAY, 
                    $DAY, $DAY, $DAY, $DAY, $DAY, $DAY, 
                    $DAY, $DAY, $DAY, $DAY, $DAY, $DAY, 
                    $DAY, $DAY, $DAY, $DAY, $DAY, $DAY, 
                    $DAY, $DAY, $DAY, $DAY, $DAY, $DAY, 
                    $DAY, $DAY, $DAY, $DAY, $DAY, $DAY
                )
            );
    
        $YAR    = new LetoBogomilMonth(36,$MONTH->getSubPeriods(), 1);
        $FIAR   = new LetoBogomilMonth(36,$MONTH->getSubPeriods(), 2);
        $MAR    = new LetoBogomilMonth(36,$MONTH->getSubPeriods(), 3);
        $RAR    = new LetoBogomilMonth(36,$MONTH->getSubPeriods(), 4);
        $YUAR   = new LetoBogomilMonth(36,$MONTH->getSubPeriods(), 5);
        $AVRAR  = new LetoBogomilMonth(36,$MONTH->getSubPeriods(), 6);
        $SEVAR  = new LetoBogomilMonth(36,$MONTH->getSubPeriods(), 7);
        $OKAR   = new LetoBogomilMonth(36,$MONTH->getSubPeriods(), 8);
        $NOAR   = new LetoBogomilMonth(36,$MONTH->getSubPeriods(), 9);
        $DEKAR  = new LetoBogomilMonth(36,$MONTH->getSubPeriods(), 10);

        
        $YEAR = 
            new LetoPeriodStructureBean(365, 
                array ( 
                    $DIRTYDAYS,
                    $YAR,   $FIAR,   $MAR,    $RAR,    $YUAR,
                    $AVRAR, $SEVAR,  $OKAR,   $NOAR,   $DEKAR 
                )
            );
    //-----------------------------------------------------------
    //           1 YEAR
    //-----------------------------------------------------------
        $YEAR_LEAP = 
            new LetoPeriodStructureBean(366, 
                array ( 
                    $DIRTYDAYS_LEAP,
                    $YAR,   $FIAR,   $MAR,    $RAR,    $YUAR,
                    $AVRAR, $SEVAR,  $OKAR,   $NOAR,   $DEKAR 
                ),
                true
            );
        
    //-----------------------------------------------------------
    //           4 YEARS
    //-----------------------------------------------------------
        $YEARS_4 = 
            new LetoPeriodStructureBean(1460, 
                array (
                    $YEAR, $YEAR, $YEAR, $YEAR
                )
            );
        $YEARS_4_LEAP = 
            new LetoPeriodStructureBean(1461, 
                array (
                    $YEAR, $YEAR, $YEAR, $YEAR_LEAP
                ),
                true
            );
    
    //-----------------------------------------------------------
    //           60 YEARS
    //-----------------------------------------------------------
        $STAR_DAY = 
            new LetoPeriodStructureBean(21914, 
                array (
                    $YEARS_4_LEAP, $YEARS_4_LEAP, $YEARS_4_LEAP, $YEARS_4_LEAP, $YEARS_4_LEAP,
                    $YEARS_4_LEAP, $YEARS_4_LEAP, $YEARS_4_LEAP, $YEARS_4_LEAP, $YEARS_4_LEAP,
                    $YEARS_4_LEAP, $YEARS_4_LEAP, $YEARS_4_LEAP, $YEARS_4_LEAP, $YEARS_4,
                )
            );
        $STAR_DAY_LEAP = 
            new LetoPeriodStructureBean(21915, 
                array (
                    $YEARS_4_LEAP, $YEARS_4_LEAP, $YEARS_4_LEAP, $YEARS_4_LEAP, $YEARS_4_LEAP,
                    $YEARS_4_LEAP, $YEARS_4_LEAP, $YEARS_4_LEAP, $YEARS_4_LEAP, $YEARS_4_LEAP,
                    $YEARS_4_LEAP, $YEARS_4_LEAP, $YEARS_4_LEAP, $YEARS_4_LEAP, $YEARS_4_LEAP,
                ),
                true
            );
    
    //-----------------------------------------------------------
    //           420 YEARS
    //-----------------------------------------------------------
        $STAR_WEEK = 
            new LetoPeriodStructureBean(153401, 
                array (
                    $STAR_DAY, 
                    $STAR_DAY_LEAP, 
                    $STAR_DAY, 
                    $STAR_DAY_LEAP, 
                    $STAR_DAY, 
                    $STAR_DAY_LEAP, 
                    $STAR_DAY
                )
            );
        $STAR_WEEK_LEAP = 
            new LetoPeriodStructureBean(153402, 
                array (
                    $STAR_DAY, 
                    $STAR_DAY_LEAP, 
                    $STAR_DAY, 
                    $STAR_DAY_LEAP, 
                    $STAR_DAY, 
                    $STAR_DAY_LEAP, 
                    $STAR_DAY_LEAP
                ),
                true
            );
    
    //-----------------------------------------------------------
    //           1 680 YEARS
    //-----------------------------------------------------------
        $STAR_MONTH = 
            new LetoPeriodStructureBean(613606, 
                array (
                    $STAR_WEEK_LEAP, $STAR_WEEK, $STAR_WEEK_LEAP, $STAR_WEEK
                )
            );
        $STAR_MONTH_LEAP = 
            new LetoPeriodStructureBean(613607, 
                array (
                    $STAR_WEEK_LEAP, $STAR_WEEK, $STAR_WEEK_LEAP, $STAR_WEEK_LEAP
                ),
                true
            );
        
    //-----------------------------------------------------------
    //           20 160 YEARS
    //-----------------------------------------------------------
        $STAR_YEAR = 
            new LetoPeriodStructureBean(7363282, 
                array (
                    $STAR_MONTH_LEAP, $STAR_MONTH_LEAP, $STAR_MONTH_LEAP,
                    $STAR_MONTH_LEAP, $STAR_MONTH_LEAP, $STAR_MONTH,
                    $STAR_MONTH_LEAP, $STAR_MONTH_LEAP, $STAR_MONTH_LEAP,
                    $STAR_MONTH_LEAP, $STAR_MONTH_LEAP, $STAR_MONTH
                )
            );
        $STAR_YEAR_LEAP = 
            new LetoPeriodStructureBean(7363283, 
                array (
                    $STAR_MONTH_LEAP, $STAR_MONTH_LEAP, $STAR_MONTH_LEAP,
                    $STAR_MONTH_LEAP, $STAR_MONTH_LEAP, $STAR_MONTH,
                    $STAR_MONTH_LEAP, $STAR_MONTH_LEAP, $STAR_MONTH_LEAP,
                    $STAR_MONTH_LEAP, $STAR_MONTH_LEAP, $STAR_MONTH_LEAP
                ),
                true
            );
        
    //-----------------------------------------------------------
    //           80 640 YEARS
    //-----------------------------------------------------------
        $STAR_YEARS_4 = 
            new LetoPeriodStructureBean(29453131, 
                array (
                    $STAR_YEAR_LEAP, $STAR_YEAR, $STAR_YEAR_LEAP, $STAR_YEAR_LEAP
                )
            );
        $STAR_YEARS_4_LEAP = 
            new LetoPeriodStructureBean(29453132, 
                array (
                    $STAR_YEAR_LEAP, $STAR_YEAR_LEAP, $STAR_YEAR_LEAP, $STAR_YEAR_LEAP
                ),
                true
            );
    
    //-----------------------------------------------------------
    //           10 080 000 YEARS
    //-----------------------------------------------------------
        $STAR_YEARS_4x125 = 
            new LetoPeriodStructureBean(3681641376, 
                array (
                    $STAR_YEARS_4, $STAR_YEARS_4, $STAR_YEARS_4, $STAR_YEARS_4, $STAR_YEARS_4,
                    $STAR_YEARS_4, $STAR_YEARS_4, $STAR_YEARS_4, $STAR_YEARS_4, $STAR_YEARS_4,
                        
                    $STAR_YEARS_4, $STAR_YEARS_4, $STAR_YEARS_4, $STAR_YEARS_4, $STAR_YEARS_4,
                    $STAR_YEARS_4, $STAR_YEARS_4, $STAR_YEARS_4, $STAR_YEARS_4, $STAR_YEARS_4,
                        
                    $STAR_YEARS_4, $STAR_YEARS_4, $STAR_YEARS_4, $STAR_YEARS_4, $STAR_YEARS_4,
                    $STAR_YEARS_4, $STAR_YEARS_4, $STAR_YEARS_4, $STAR_YEARS_4, $STAR_YEARS_4,
                        
                    $STAR_YEARS_4, $STAR_YEARS_4, $STAR_YEARS_4, $STAR_YEARS_4, $STAR_YEARS_4,
                    $STAR_YEARS_4, $STAR_YEARS_4, $STAR_YEARS_4, $STAR_YEARS_4, $STAR_YEARS_4,
                        
                    $STAR_YEARS_4, $STAR_YEARS_4, $STAR_YEARS_4, $STAR_YEARS_4, $STAR_YEARS_4,
                    $STAR_YEARS_4, $STAR_YEARS_4, $STAR_YEARS_4, $STAR_YEARS_4, $STAR_YEARS_4,
                        
                    $STAR_YEARS_4, $STAR_YEARS_4, $STAR_YEARS_4, $STAR_YEARS_4, $STAR_YEARS_4,
                    $STAR_YEARS_4, $STAR_YEARS_4, $STAR_YEARS_4, $STAR_YEARS_4, $STAR_YEARS_4,
                        
                    $STAR_YEARS_4, $STAR_YEARS_4,
                        
                    $STAR_YEARS_4_LEAP,
                        
                    $STAR_YEARS_4, $STAR_YEARS_4, $STAR_YEARS_4, $STAR_YEARS_4, $STAR_YEARS_4,
                    $STAR_YEARS_4, $STAR_YEARS_4, $STAR_YEARS_4, $STAR_YEARS_4, $STAR_YEARS_4,
                        
                    $STAR_YEARS_4, $STAR_YEARS_4, $STAR_YEARS_4, $STAR_YEARS_4, $STAR_YEARS_4,
                    $STAR_YEARS_4, $STAR_YEARS_4, $STAR_YEARS_4, $STAR_YEARS_4, $STAR_YEARS_4,
                        
                    $STAR_YEARS_4, $STAR_YEARS_4, $STAR_YEARS_4, $STAR_YEARS_4, $STAR_YEARS_4,
                    $STAR_YEARS_4, $STAR_YEARS_4, $STAR_YEARS_4, $STAR_YEARS_4, $STAR_YEARS_4,
                        
                    $STAR_YEARS_4, $STAR_YEARS_4, $STAR_YEARS_4, $STAR_YEARS_4, $STAR_YEARS_4,
                    $STAR_YEARS_4, $STAR_YEARS_4, $STAR_YEARS_4, $STAR_YEARS_4, $STAR_YEARS_4,
                        
                    $STAR_YEARS_4, $STAR_YEARS_4, $STAR_YEARS_4, $STAR_YEARS_4, $STAR_YEARS_4,
                    $STAR_YEARS_4, $STAR_YEARS_4, $STAR_YEARS_4, $STAR_YEARS_4, $STAR_YEARS_4,
                        
                    $STAR_YEARS_4, $STAR_YEARS_4, $STAR_YEARS_4, $STAR_YEARS_4, $STAR_YEARS_4,
                    $STAR_YEARS_4, $STAR_YEARS_4, $STAR_YEARS_4, $STAR_YEARS_4, $STAR_YEARS_4,
                        
                    $STAR_YEARS_4, $STAR_YEARS_4
                )
            );
    // -------------------------------------------------------------------------------------------//
    //                                   T Y P E S                                                //
    // -------------------------------------------------------------------------------------------//
    
        $DAY_PERIOD_TYPE = 
            new LetoPeriodTypeBean("Day", "1 day period",
                array ( $DAY )
            ); 
        
        $MONTH_PERIOD_TYPE =         
            new LetoPeriodTypeBean("Month", "5, 6 or 36 days period", 
                array ( 
                        $DIRTYDAYS,
                        $YAR,
                        $FIAR,
                        $MAR,
                        $RAR,
                        $YUAR,
                        $AVRAR,
                        $SEVAR,
                        $OKAR,
                        $NOAR,
                        $DEKAR,
                        $DIRTYDAYS_LEAP,
                )
            );
        
        $YEAR_PERIOD_TYPE =         
            new LetoPeriodTypeBean("Year", "Year", 
                array ( $YEAR, $YEAR_LEAP )
            );
            
        $YEARS_4_PERIOD_TYPE =         
            new LetoPeriodTypeBean("4 years", "4 Years", 
                array ( $YEARS_4, $YEARS_4_LEAP )
            );
        
        $STAR_DAY_PERIOD_TYPE =         
            new LetoPeriodTypeBean("Star Day", "60 years", 
                array ( $STAR_DAY, $STAR_DAY_LEAP )
            );
            
        $STAR_WEEK_PERIOD_TYPE =         
            new LetoPeriodTypeBean("Star Week", "420 years", 
                array ( $STAR_WEEK, $STAR_WEEK_LEAP )
            );
            
        $STAR_MONTH_PERIOD_TYPE =         
            new LetoPeriodTypeBean("Star Month", "1680 years", 
                array ( $STAR_MONTH, $STAR_MONTH_LEAP )
            );
        
        $STAR_YEAR_PERIOD_TYPE =         
            new LetoPeriodTypeBean("Star Year", "2160 years", 
                array ( $STAR_YEAR, $STAR_YEAR_LEAP )
            );
            
        $STAR_YEAR_4_PERIOD_TYPE =         
            new LetoPeriodTypeBean("Star 4 Years Period", "80640 years", 
                array ( $STAR_YEARS_4_LEAP, $STAR_YEARS_4 )
            );
        
        $STAR_YEAR_4x125_PERIOD_TYPE =         
            new LetoPeriodTypeBean("Star 125 Years Period", "10 080 000 years", 
                array ( $STAR_YEARS_4x125 )
            );

    
        $this->TYPES = array ( 
            $DAY_PERIOD_TYPE, 
            $MONTH_PERIOD_TYPE,
            $YEAR_PERIOD_TYPE,
            $YEARS_4_PERIOD_TYPE,
            $STAR_DAY_PERIOD_TYPE,
            $STAR_WEEK_PERIOD_TYPE,
            $STAR_MONTH_PERIOD_TYPE,
            $STAR_YEAR_PERIOD_TYPE,
            $STAR_YEAR_4_PERIOD_TYPE,
            $STAR_YEAR_4x125_PERIOD_TYPE
        );
        //----------------------------
        //Day
        $LetoBogomil_DAYLengths = array();
        $DAY->setTotalLengthInPeriodTypes($LetoBogomil_DAYLengths);
        // Pseudo Month
        //----------------------------
        $LetoBogomil_DirtyDaysLengths = array($DAY_PERIOD_TYPE->getName() => '5');
        $DIRTYDAYS->setTotalLengthInPeriodTypes($LetoBogomil_DirtyDaysLengths);
        // Pseudo Month
        //----------------------------
        $LetoBogomil_DirtyDaysLeapLengths = array($DAY_PERIOD_TYPE->getName() => '6');
        $DIRTYDAYS_LEAP->setTotalLengthInPeriodTypes($LetoBogomil_DirtyDaysLeapLengths);
        //Month
        $LetoBogomil_YarLengths = array($DAY_PERIOD_TYPE->getName() => '36');
        $YAR->setTotalLengthInPeriodTypes($LetoBogomil_YarLengths);
        //----------------------------
        //Month
        $LetoBogomil_FiarLengths = array($DAY_PERIOD_TYPE->getName() => '36');
        $FIAR->setTotalLengthInPeriodTypes($LetoBogomil_FiarLengths);
        //----------------------------
        //Month
        $LetoBogomil_MarLengths = array($DAY_PERIOD_TYPE->getName() => '36');
        $MAR->setTotalLengthInPeriodTypes($LetoBogomil_MarLengths);
        //----------------------------
        //Month
        $LetoBogomil_RarLengths = array($DAY_PERIOD_TYPE->getName() => '36');
        $RAR->setTotalLengthInPeriodTypes($LetoBogomil_RarLengths);
        //----------------------------
        //Month
        $LetoBogomil_YuarLengths = array($DAY_PERIOD_TYPE->getName() => '36');
        $YUAR->setTotalLengthInPeriodTypes($LetoBogomil_YuarLengths);
        //----------------------------
        //Month
        $LetoBogomil_AvrarLengths = array($DAY_PERIOD_TYPE->getName() => '36');
        $AVRAR->setTotalLengthInPeriodTypes($LetoBogomil_AvrarLengths);
        //----------------------------
        //Month
        $LetoBogomil_SevarLengths = array($DAY_PERIOD_TYPE->getName() => '36');
        $SEVAR->setTotalLengthInPeriodTypes($LetoBogomil_SevarLengths);
        //----------------------------
        //Month
        $LetoBogomil_OkarLengths = array($DAY_PERIOD_TYPE->getName() => '36');
        $OKAR->setTotalLengthInPeriodTypes($LetoBogomil_OkarLengths);
        //----------------------------
        //Month
        $LetoBogomil_NoarLengths = array($DAY_PERIOD_TYPE->getName() => '36');
        $NOAR->setTotalLengthInPeriodTypes($LetoBogomil_NoarLengths);
        //----------------------------
        //Month
        $LetoBogomil_DekarLengths = array($DAY_PERIOD_TYPE->getName() => '36');
        $DEKAR->setTotalLengthInPeriodTypes($LetoBogomil_DekarLengths);
        //----------------------------
        //Year
        $LetoBogomil_YEARLengths = array($DAY_PERIOD_TYPE->getName() => '365', 
                                           $MONTH_PERIOD_TYPE->getName() => '12');
        $YEAR->setTotalLengthInPeriodTypes($LetoBogomil_YEARLengths);
        //----------------------------
        //Year
        $LetoBogomil_YEAR_LEAPLengths = array($DAY_PERIOD_TYPE->getName() => '366', 
                                                $MONTH_PERIOD_TYPE->getName() => '12');
        $YEAR_LEAP->setTotalLengthInPeriodTypes($LetoBogomil_YEAR_LEAPLengths);
        //----------------------------
        //4 years
        $LetoBogomil_YEARS_4Lengths = array($YEAR_PERIOD_TYPE->getName() => '4', 
                                              $MONTH_PERIOD_TYPE->getName() => '48', 
                                              $DAY_PERIOD_TYPE->getName() => '1460');
        $YEARS_4->setTotalLengthInPeriodTypes($LetoBogomil_YEARS_4Lengths);
        //----------------------------
        //4 years
        $LetoBogomil_YEARS_4_LEAPLengths = array($YEAR_PERIOD_TYPE->getName() => '4', 
                                                   $MONTH_PERIOD_TYPE->getName() => '48', 
                                                   $DAY_PERIOD_TYPE->getName() => '1461');
        $YEARS_4_LEAP->setTotalLengthInPeriodTypes($LetoBogomil_YEARS_4_LEAPLengths);
        //----------------------------
        //Star Day
        $LetoBogomil_STAR_DAYLengths = array($YEARS_4_PERIOD_TYPE->getName() => '15',
                                               $YEAR_PERIOD_TYPE->getName()    => '60', 
                                               $MONTH_PERIOD_TYPE->getName()   => '720',
                                               $DAY_PERIOD_TYPE->getName()     => '21914');
        $STAR_DAY->setTotalLengthInPeriodTypes($LetoBogomil_STAR_DAYLengths);
        //----------------------------
        //Star Day
        $LetoBogomil_STAR_DAY_LEAPLengths = array($YEARS_4_PERIOD_TYPE->getName() => '15',
                                                    $YEAR_PERIOD_TYPE->getName()    => '60', 
                                                    $MONTH_PERIOD_TYPE->getName()   => '720',
                                                    $DAY_PERIOD_TYPE->getName()     => '21915');
        $STAR_DAY_LEAP->setTotalLengthInPeriodTypes($LetoBogomil_STAR_DAY_LEAPLengths);
        //----------------------------
        //Star Week
        $LetoBogomil_STAR_WEEKLengths = array($STAR_DAY_PERIOD_TYPE->getName() => '7',
                                                $YEARS_4_PERIOD_TYPE->getName()  => '105',
                                                $YEAR_PERIOD_TYPE->getName()     => '420',
                                                $MONTH_PERIOD_TYPE->getName()    => '5040',
                                                $DAY_PERIOD_TYPE->getName()      => '153401');
        $STAR_WEEK->setTotalLengthInPeriodTypes($LetoBogomil_STAR_WEEKLengths);
        //----------------------------
        //Star Week
        $LetoBogomil_STAR_WEEK_LEAPLengths = array($STAR_DAY_PERIOD_TYPE->getName() => '7',
                                                     $YEARS_4_PERIOD_TYPE->getName()  => '105',
                                                     $YEAR_PERIOD_TYPE->getName()     => '420',
                                                     $MONTH_PERIOD_TYPE->getName()    => '5040',
                                                     $DAY_PERIOD_TYPE->getName()      => '153402');
        $STAR_WEEK_LEAP->setTotalLengthInPeriodTypes($LetoBogomil_STAR_WEEK_LEAPLengths);
        //----------------------------
        //Star Month
        $LetoBogomil_STAR_MONTHLengths = array($STAR_WEEK_PERIOD_TYPE->getName() => '4',
                                                 $STAR_DAY_PERIOD_TYPE->getName()  => '28',
                                                 $YEARS_4_PERIOD_TYPE->getName()   => '420',
                                                 $YEAR_PERIOD_TYPE->getName()      => '1680',
                                                 $MONTH_PERIOD_TYPE->getName()     => '20160',
                                                 $DAY_PERIOD_TYPE->getName()       => '613606');
        $STAR_MONTH->setTotalLengthInPeriodTypes($LetoBogomil_STAR_MONTHLengths);
        //----------------------------
        //Star Month
        $LetoBogomil_STAR_MONTH_LEAPLengths = array($STAR_WEEK_PERIOD_TYPE->getName() => '4',
                                                      $STAR_DAY_PERIOD_TYPE->getName()  => '28',
                                                      $YEARS_4_PERIOD_TYPE->getName()   => '420',
                                                      $YEAR_PERIOD_TYPE->getName()      => '1680',
                                                      $MONTH_PERIOD_TYPE->getName()     => '20160',
                                                      $DAY_PERIOD_TYPE->getName()       => '613607');
        $STAR_MONTH_LEAP->setTotalLengthInPeriodTypes($LetoBogomil_STAR_MONTH_LEAPLengths);
        //----------------------------
        //Star Year
        $LetoBogomil_STAR_YEARLengths = array($STAR_MONTH_PERIOD_TYPE->getName() => '12',
                                                $STAR_WEEK_PERIOD_TYPE->getName()  => '48',
                                                $STAR_DAY_PERIOD_TYPE->getName()   => '336',
                                                $YEARS_4_PERIOD_TYPE->getName()    => '5040',
                                                $YEAR_PERIOD_TYPE->getName()       => '20160',
                                                $MONTH_PERIOD_TYPE->getName()      => '241920',
                                                $DAY_PERIOD_TYPE->getName()        => '7363282');
        $STAR_YEAR->setTotalLengthInPeriodTypes($LetoBogomil_STAR_YEARLengths);
        //----------------------------
        //Star Year
        $LetoBogomil_STAR_YEAR_LEAPLengths = array($STAR_MONTH_PERIOD_TYPE->getName() => '12',
                                                     $STAR_WEEK_PERIOD_TYPE->getName()  => '48',
                                                     $STAR_DAY_PERIOD_TYPE->getName()   => '336',
                                                     $YEARS_4_PERIOD_TYPE->getName()    => '5040',
                                                     $YEAR_PERIOD_TYPE->getName()       => '20160',
                                                     $MONTH_PERIOD_TYPE->getName()      => '241920',
                                                     $DAY_PERIOD_TYPE->getName()        => '7363283');
        $STAR_YEAR_LEAP->setTotalLengthInPeriodTypes($LetoBogomil_STAR_YEAR_LEAPLengths);
        //----------------------------
        //Star 4 Years Period
        $LetoBogomil_STAR_YEARS_4_LEAPLengths = array($STAR_YEAR_PERIOD_TYPE->getName()  => '4',
                                                        $STAR_MONTH_PERIOD_TYPE->getName() => '48',
                                                        $STAR_WEEK_PERIOD_TYPE->getName()  => '192',
                                                        $STAR_DAY_PERIOD_TYPE->getName()   => '1344',
                                                        $YEARS_4_PERIOD_TYPE->getName()    => '20160',
                                                        $YEAR_PERIOD_TYPE->getName()       => '80640',
                                                        $MONTH_PERIOD_TYPE->getName()      => '967680',
                                                        $DAY_PERIOD_TYPE->getName()        => '29453132');
        $STAR_YEARS_4_LEAP->setTotalLengthInPeriodTypes($LetoBogomil_STAR_YEARS_4_LEAPLengths);
        //----------------------------
        //Star 4 Years Period
        $LetoBogomil_STAR_YEARS_4Lengths = array($STAR_YEAR_PERIOD_TYPE->getName()  => '4',
                                                   $STAR_MONTH_PERIOD_TYPE->getName() => '48',
                                                   $STAR_WEEK_PERIOD_TYPE->getName()  => '192',
                                                   $STAR_DAY_PERIOD_TYPE->getName()   => '1344',
                                                   $YEARS_4_PERIOD_TYPE->getName()    => '20160',
                                                   $YEAR_PERIOD_TYPE->getName()       => '80640',
                                                   $MONTH_PERIOD_TYPE->getName()      => '967680',
                                                   $DAY_PERIOD_TYPE->getName()        => '29453131');
        $STAR_YEARS_4->setTotalLengthInPeriodTypes($LetoBogomil_STAR_YEARS_4Lengths);
        //----------------------------
        //Star 125 Years Period
        $LetoBogomil_STAR_YEARS_4x125Lengths = 
                    array($STAR_YEAR_4_PERIOD_TYPE->getName() => '125',
                          $STAR_YEAR_PERIOD_TYPE->getName()   => '500',
                          $STAR_MONTH_PERIOD_TYPE->getName()  => '6000',
                          $STAR_WEEK_PERIOD_TYPE->getName()   => '24000',
                          $STAR_DAY_PERIOD_TYPE->getName()    => '168000',
                          $YEARS_4_PERIOD_TYPE->getName()     => '2520000',
                          $YEAR_PERIOD_TYPE->getName()        => '10080000',
                          $MONTH_PERIOD_TYPE->getName()       => '120960000',
                          $DAY_PERIOD_TYPE->getName()         => '3681641376');
        $STAR_YEARS_4x125->setTotalLengthInPeriodTypes($LetoBogomil_STAR_YEARS_4x125Lengths);
    }

    
    public function getCalendarPeriodTypes() {
        return $this->TYPES;
    }

    /**
     * All inheriting classes should define the beginning of their calendar in days before the java EPOCH. 
     * @return The beginning of calendar in days before java EPOCH.
     */
    public function startOfCalendarInDaysBeforeJavaEpoch() {
        return $this->START_OF_CALENDAR_BEFORE_JAVA_EPOCH;
    }

    
    // Testing -----------------------------------------------------------------------------------------------------
    
    public static function getStructureName($type) {
        $typeStr = "";
        if ($type == LetoBogomil.DAY) {
            $typeStr = "LetoBogomil.DAY";
        } else if ($type == LetoBogomil.DIRTYDAYS) {
            $typeStr = "LetoBogomil.DIRTYDAYS";
        } else if ($tyoe == LetoBogomil.DIRTYDAYS_LEAP) {
            $typeStr = "LetoBogomil.DIRTYDAYS_LEAP";
        } else if ($type == LetoBogomil.YAR) {
            $typeStr = "LetoBogomil.YAR";
        } else if ($type == LetoBogomil.FIAR) {
            $typeStr = "LetoBogomil.FIAR";
        } else if ($type == LetoBogomil.MAR) {
            $typeStr = "LetoBogomil.MAR";
        } else if ($type == LetoBogomil.RAR) {
            $typeStr = "LetoBogomil.RAR";
        }  else if ($type == LetoBogomil.YUAR) {
            $typeStr = "LetoBogomil.YUAR";
        }  else if ($type == LetoBogomil.AVRAR) {
            $typeStr = "LetoBogomil.AVRAR";
        }  else if ($type == LetoBogomil.SEVAR) {
            $typeStr = "LetoBogomil.SEVAR";
        }  else if ($type == LetoBogomil.OKAR) {
            $typeStr = "LetoBogomil.OKAR";
        }  else if ($type == LetoBogomil.NOAR) {
            $typeStr = "LetoBogomil.NOAR";
        }  else if ($type == LetoBogomil.DEKAR) {
            $typeStr = "LetoBogomil.DEKAR";
        }  else if ($type == LetoBogomil.YEAR) {
            $typeStr = "LetoBogomil.YEAR";
        } else if ($type == LetoBogomil.YEAR_LEAP) {
            $typeStr = "LetoBogomil.YEAR_LEAP";
        } else if ($type == LetoBogomil.YEARS_4) {
            $typeStr = "LetoBogomil.YEARS_4";
        } else if ($type == LetoBogomil.YEARS_4_LEAP) {
            $typeStr = "LetoBogomil.YEARS_4_LEAP";
        } else if ($type == LetoBogomil.STAR_DAY) {
            $typeStr = "LetoBogomil.STAR_DAY";
        } else if ($type == LetoBogomil.STAR_DAY_LEAP) {
            $typeStr = "LetoBogomil.STAR_DAY_LEAP";
        } else if ($type == LetoBogomil.STAR_WEEK) {
            $typeStr = "LetoBogomil.STAR_WEEK";
        } else if ($type == LetoBogomil.STAR_WEEK_LEAP) {
            $typeStr = "LetoBogomil.STAR_WEEK_LEAP";
        } else if ($type == LetoBogomil.STAR_MONTH) {
            $typeStr = "LetoBogomil.STAR_MONTH";
        } else if ($type == LetoBogomil.STAR_MONTH_LEAP) {
            $typeStr = "LetoBogomil.STAR_MONTH_LEAP";
        } else if ($type == LetoBogomil.STAR_YEAR) {
            $typeStr = "LetoBogomil.STAR_YEAR";
        } else if ($type == LetoBogomil.STAR_YEAR_LEAP) {
            $typeStr = "LetoBogomil.STAR_YEAR_LEAP";
        } else if ($type == LetoBogomil.STAR_YEARS_4_LEAP) {
            $typeStr = "LetoBogomil.STAR_YEARS_4_LEAP";
        } else if ($type == LetoBogomil.YEAR_LEAP) {
            $typeStr = "LetoBogomil.YEAR_LEAP";
        } else if ($type == LetoBogomil.YEARS_4) {
            $typeStr = "LetoBogomil.YEARS_4";
        } else if ($type == LetoBogomil.YEARS_4_LEAP) {
            $typeStr = "LetoBogomil.YEARS_4_LEAP";
        } else if ($type == LetoBogomil.STAR_YEARS_4) {
            $typeStr = "LetoBogomil.STAR_YEARS_4";
        } else if ($type == LetoBogomil.STAR_YEARS_4x125) {
            $typeStr = "LetoBogomil.STAR_YEARS_4x125";
        } else {
            $typeStr = "ERROR (" . $type . ", " . $type.getPeriodType().getName() . ") ";
        }
        return typeStr;
    }
    
    public static function getTypeName($type) {
        $typeStr = "";
        if ($type == LetoBogomil.DAY_PERIOD_TYPE) {
            $typeStr = "LetoBogomil.DAY_PERIOD_TYPE";
        } else if ($type == LetoBogomil.MONTH_PERIOD_TYPE) {
            $typeStr = "LetoBogomil.MONTH_PERIOD_TYPE";
        } else if ($type == LetoBogomil.YEAR_PERIOD_TYPE) {
            $typeStr = "LetoBogomil.YEAR_PERIOD_TYPE";
        } else if ($type == LetoBogomil.YEARS_4_PERIOD_TYPE) {
            $typeStr = "LetoBogomil.YEARS_4_PERIOD_TYPE";
        } else if ($type == LetoBogomil.STAR_DAY_PERIOD_TYPE) {
            $typeStr = "LetoBogomil.STAR_DAY_PERIOD_TYPE";
        } else if ($type == LetoBogomil.STAR_WEEK_PERIOD_TYPE) {
            $typeStr = "LetoBogomil.STAR_WEEK_PERIOD_TYPE";
        } else if ($type == LetoBogomil.STAR_MONTH_PERIOD_TYPE) {
            $typeStr = "LetoBogomil.STAR_MONTH_PERIOD_TYPE";
        } else if ($type == LetoBogomil.STAR_YEAR_PERIOD_TYPE) {
            $typeStr = "LetoBogomil.STAR_YEAR_PERIOD_TYPE";
        } else if ($type == LetoBogomil.STAR_YEAR_4_PERIOD_TYPE) {
            $typeStr = "LetoBogomil.STAR_YEAR_4_PERIOD_TYPE";
        } else if ($type == LetoBogomil.STAR_YEAR_4x125_PERIOD_TYPE) {
            $typeStr = "LetoBogomil.STAR_YEAR_4x125_PERIOD_TYPE";
        } else {
            $typeStr = "ERROR (" . $type . ", " . $type.getName() . ") ";
        }
        return $typeStr;
    }
    
    public static function testPeriod($structure) {
        $lengths = LetoCorrectnessChecks::calcuateLengthInPeriodTypes($structure);
        $keySet = $lengths.keySet();
        $iterator = $keySet.iterator();
        
        $structureStr = getStructureName($structure);
        $structureString = $structureStr.replace('.', '_');
        $structureString = $structureString + "Lengths";
        
        
        echo "Map<LetoPeriodType, Long> " . $structureString . " = new HashMap<LetoPeriodType, Long>(" . $keySet.size() . ");";
        while($iterator.hasNext()) {
            $type = $iterator.next();
            $count = $lengths.get($type);
            //System.out.println("" + type.getName() + ": " + (count == null ? 0 : count.longValue()) );
            $typeString = getTypeName($type);
            echo $structureString . ".put(" . $typeString . ", new Long(" . ($count == null ? 0 : $count.longValue() ). "));";
        }
        echo $structureStr . ".setTotalLengthInPeriodTypes(" . $structureString . ");";
        
    }
    
    public static function main($argv) {
        LetoBogomil::testPeriod(LetoBogomil.DAY);
        LetoBogomil::testPeriod(LetoBogomil.DIRTYDAYS);
        LetoBogomil::testPeriod(LetoBogomil.DIRTYDAYS_LEAP);
        LetoBogomil::testPeriod(LetoBogomil.YAR);
        LetoBogomil::testPeriod(LetoBogomil.FIAR);
        LetoBogomil::testPeriod(LetoBogomil.MAR);
        LetoBogomil::testPeriod(LetoBogomil.RAR);     
        LetoBogomil::testPeriod(LetoBogomil.YUAR);
        LetoBogomil::testPeriod(LetoBogomil.AVRAR);
        LetoBogomil::testPeriod(LetoBogomil.SEVAR);        
        LetoBogomil::testPeriod(LetoBogomil.OKAR);
        LetoBogomil::testPeriod(LetoBogomil.NOAR);
        LetoBogomil::testPeriod(LetoBogomil.DEKAR);
        LetoBogomil::testPeriod(LetoBogomil.YEAR);
        LetoBogomil::testPeriod(LetoBogomil.YEAR_LEAP);
        LetoBogomil::testPeriod(LetoBogomil.YEARS_4);
        LetoBogomil::testPeriod(LetoBogomil.YEARS_4_LEAP);
        LetoBogomil::testPeriod(LetoBogomil.STAR_DAY);
        LetoBogomil::testPeriod(LetoBogomil.STAR_DAY_LEAP);
        LetoBogomil::testPeriod(LetoBogomil.STAR_WEEK);
        LetoBogomil::testPeriod(LetoBogomil.STAR_WEEK_LEAP);
        LetoBogomil::testPeriod(LetoBogomil.STAR_MONTH);
        LetoBogomil::testPeriod(LetoBogomil.STAR_MONTH_LEAP);
        LetoBogomil::testPeriod(LetoBogomil.STAR_YEAR);
        LetoBogomil::testPeriod(LetoBogomil.STAR_YEAR_LEAP);
        LetoBogomil::testPeriod(LetoBogomil.STAR_YEARS_4_LEAP);
        LetoBogomil::testPeriod(LetoBogomil.STAR_YEARS_4);
        LetoBogomil::testPeriod(LetoBogomil.STAR_YEARS_4x125);
        
        $bg = new LetoBogomil();
        $bg.checkCorrectness();
    }

}
?>
