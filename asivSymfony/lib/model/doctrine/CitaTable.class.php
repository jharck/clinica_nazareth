<?php

/**
 * CitaTable
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class CitaTable extends Doctrine_Table {

    /**
     * Returns an instance of this class.
     *
     * @return object CitaTable
     */
    public static function getInstance() {
        return Doctrine_Core::getTable('Cita');
    }

    /**
     * Returns the number of records (meetings) for today, based on the status
     * @param int $iStatus defaulted to 3 (Confirmed)
     * @return int
     */
    public function getTodayMeetingCounter($iStatus = 3) {
        $sTodayDate = date("Y-m-d");
        $oDQL = $this->createQuery("c")
                ->select("COUNT(DISTINCT(c.id_cita)) as today_dates")
                ->where("c.fecha_cita = ?", array($sTodayDate))
                ->andWhere("c.id_estado_cita = ?", array($iStatus));
        $aDoctrineCollection = $oDQL->execute(array(), Doctrine_Core::HYDRATE_ARRAY);
        return $aDoctrineCollection[0]['today_dates'];
    }

    /**
     * 
     * @param string $sStartDate parameter sent by the js lib calendar
     * @param string $sEndDate sent by the calendar js library
     * @return array in the required format by fullcalendar javascript library
     */
    public function getBusyIntervals($sStartDate, $sEndDate) {
        $oDQL = $this->createQuery("c")
                ->where("c.fecha_cita >= ? AND c.fecha_cita <= ?", array($sStartDate, $sEndDate))
                ->andWhereIn("c.id_estado_cita", array(3, 1, 4));
        $oCitaRecordList = $oDQL->execute(array(), Doctrine_Core::HYDRATE_RECORD);
        $oCita = new Cita();
        $aCita = array();
        foreach ($oCitaRecordList as $oCita) {
            array_push($aCita, array(
                'title' => "Ocupado",
                "start" => $oCita->getFechaCita() . "T" . $oCita->getInicioHoraCita(),
                "end" => $oCita->getFechaCita() . "T" . $oCita->getFinHoraCita()
            ));
        }
        return $aCita;
    }

    /**
     * Returns all the records (meetings) scheduled for today (regardless the status)
     * @return DoctrineCollection Record List of all the meeting scheduled for today
     */
    public function getTodayMeetingCollection() {
        $sTodayDate = date("Y-m-d");
        $oDQL = $this->createQuery("c")
                ->where("c.fecha_cita = ?", array($sTodayDate))
                ->orderBy("c.inicio_hora_cita ASC");
        return $oDQL->execute();
    }

    /**
     * Update the Status of a meeting given an ID
     * <i>Possibles values</i>: 
     * 1 -> <b>Pending</b>
     * 2 -> <b>Cancel</b>
     * 3 -> <b>Confirm</b>
     * 4 -> <b>in Meeting</b>
     * @param int $iMeetingId 
     * @param int $iMeetingNewStatus New status for the given meeting ID
     * @return boolean Returns whether or not the record was updated
     */
    public function doUpdateMeetingStatus($iMeetingId, $iMeetingNewStatus) {
        $oDQL = $this->createQuery("c")
                ->update()
                ->set("c.id_estado_cita", $iMeetingNewStatus)
                ->where("c.id_cita = ?", array($iMeetingId));
        $iAffectedRows = $oDQL->execute();
        return $iAffectedRows > 0;
    }

    /**
     * Returns a json formatted string to build a chart
     * @param type $iPaciente
     * @return array json object
     */
    public function getJsonChartInfo($iPaciente) {
        $aData = array(
            'cat' => array(), 
            'weight' => array(),
            'temp' => array(), 
            'pre' => array(), 
            'height' => array());
        $oDQL = $this->createQuery("c")
                ->where("c.id_paciente = ?", array($iPaciente));
        $oCitaRecordList = $oDQL->execute();
        $oCita = new Cita();
        foreach ($oCitaRecordList as $oCita) {
            array_push($aData['cat'], $oCita->getFechaCita());
            array_push($aData['weight'], (float) $oCita->getPesoPacientel());
            array_push($aData['temp'], (float) $oCita->getTemperaturaPaciente());
            array_push($aData['pre'], (float) $oCita->getPresionPaciente());
            array_push($aData['height'], (float) $oCita->getAlturaPaciente());
        }
        return $aData;
    }
}