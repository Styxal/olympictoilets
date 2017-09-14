<div class="panel">
    <div class="panel-header">
        Average Calculator
    </div>
    <div class="panel-body">
        <form method="get" action="/api/average.php" id="average">
            <select name="attr" id="attr">
                <option value="age">Age (years)</option>
                <option value="height_cm">Height (cm)</option>
                <option value="weight_kg">Weight (kg)</option>
            </select>
            <?php $sports = $database->executeQuery("SELECT sport.sport_name, sport.sport_id FROM sport;"); ?>
            <select name="sport" id="sport">
                <?php foreach ($sports as $sport): ?>
                    <option value="<?php echo $sport['sport_id']; ?>"><?php echo $sport['sport_name'] ?></option>
                <?php endforeach; ?>
            </select>
            <input type="submit" value="Go">
        </form>
        <div id="result"></div>
    </div>
</div>

