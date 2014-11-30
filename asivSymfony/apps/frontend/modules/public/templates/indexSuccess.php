<script>



</script>
<style>	
    #calendar {
        max-width: 900px;
        margin: 0 auto;
    }
</style>
<div class="contentMiddle clear">
    <div style="margin: 44.7px;">
        <h1 style="color: #d3d3d3;">Consulta de horarios</h1>
        <div class="space10"></div>
        <h4>Este calendario se actualiza en tiempo real, considere los horarios disponibles para mayor comodidad</h4>
        <div class="space30"></div>
        <div id='calendar' data-get_json_url="<?php echo url_for("public/getSchedules"); ?>"></div>
        <div class="space30"></div>
    </div>
    <!-- end: contentMiddle -->
</div>