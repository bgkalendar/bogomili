<?php

class LetoBogomilMonth extends LetoPeriodStructureBean {
    
    private $mIndexInYear = 0;
    
    private static $DEFAULT_LOCALE = "bg";
    private static $sLocaleMonthNames = array(
              'bg' => array ( 'Мръснидни',  'Яр',     'Фиар',   'Map',   'Рар',    'Юар',  
                                            'Аврар',  'Севар',  'Окар',  'Ноар',   'Декар'),
              'en' => array ( 'Dirtydays',  'Yar',    'Fiar',   'Mar',   'Rar',    'Yuar',  
                                            'Avrar',  'Sevar',  'Okar',  'Noar',   'Dekar'),
              'de' => array ( 'Dirtydays',  'Jar',    'Fiar',   'Mar',   'Rar',    'Juar',  
                                            'Awrar',  'Sewar',  'Okar',  'Noar',   'Dekar'),
              'ru' => array ( 'Мёртвыедни', 'Яр',     'Фиар',   'Map',   'Рар',    'Юар',  
                                            'Аврар',  'Севар',  'Окар',  'Ноар',   'Декар')
    );
    
    
    /**
     * Create new Month representation objec that would be able to return the name ofthe month based on its index 
     * within the year and the target locale.
     * @param totalLengthInDays
     * @param subPeriods
     * @param indexInYear Index of the month withing the year, starting from 0. Zero is for January. 1 is for February.
     *        11 is for December.
     */
    public function __construct($totalLengthInDays, $subPeriods, $indexInYear) 
    {
        parent::__construct($totalLengthInDays, $subPeriods);
        $this->mIndexInYear = $indexInYear;
        if ($this->mIndexInYear < 1 || $this->mIndexInYear > 10) {
            throw new LetoExceptionUnrecoverable("No month with index " . $indexInYear 
                   . " is supported in Bogomilski calendar. Allowed values are between 1 (Month Yar) and 10 (Month Dekar).");
        }
    }
    
    
    /**
     * Create new Month representation objec that would be able to return the name ofthe month based on its index 
     * within the year and the target locale.
     * @param totalLengthInDays
     * @param subPeriods
     * @param indexInYear Index of the month withing the year, starting from 0. Zero is for January. 1 is for February.
     *        11 is for December.
     */
    public function __construct1($bean, $indexInYear) 
    {
        $this->__construct($bean.getTotalLengthInDays(), $bean.getSubPeriods(), $indexInYear);
    }
    
    public function getName($locale = "bg") {
        $months = null;
        if ($locale != null) {
            $months = LetoBogomilMonth::$sLocaleMonthNames[$locale];
        }
        
        return $months[$this->mIndexInYear];
    }
}
?>
