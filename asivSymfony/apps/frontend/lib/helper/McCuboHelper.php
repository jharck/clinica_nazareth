<?php

/**
 * Description of McCuboHelper
 *
 * @author debian
 */
class McCuboHelper {

    public static function getDateDiff($sLowDate, $sHighDate = NUll, $bAbsolute = FALSE) {
        $oFirstDate = new DateTime($sLowDate);
        if (NULL == $sHighDate) {
            $oSecondDate = new DateTime("now");
        } else {
            $oSecondDate = new DateTime($sHighDate);
        }
        $oDiff = $oFirstDate->diff($oSecondDate, $bAbsolute);
        return $oDiff->format('%R%a dias');
    }

    public static function getMinutesDiff($sLowerTime, $sHigherTime = NULL) {
        if (NULL == $sHigherTime) {
            $sHigherTime = strtotime(date("H:i:s"));
        } else {
            $sHigherTime = strtotime($sHigherTime);
        }
        $sLowerTime = strtotime($sLowerTime);
        return round(abs($sHigherTime - $sLowerTime) / 60,2);
    }

}

?>
