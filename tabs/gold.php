<div class="panel">
    <div class="panel-header">
        Which countries won the most gold medals?
    </div>
    <div class="panel-body">
        <?php
        $sql =
            "SELECT country.country_name, athlete_medal.medal_count
               FROM country
              INNER 
               JOIN athlete 
                ON country.country_id = athlete.country_id
              INNER 
               JOIN athlete_medal 
                ON athlete.athlete_id = athlete_medal.athlete_id
               INNER 
                JOIN medal  
                 ON athlete_medal.medal_id = medal.medal_id
                  AND medal.medal_name='gold'";
        $table = $database->executeQuery($sql);
        $medal_count = [];
        foreach ($table as $item) {
            if(!isset($medal_count[$item['country_name']]))
                $medal_count[$item['country_name']] = 0;
            $medal_count[$item['country_name']] += $item['medal_count'];
        }
        arsort($medal_count);
        $top5 = array_slice($medal_count,0,5,true);
        ?>
        <table cellspacing="0" cellpadding="0">
            <thead>
            <tr>
                <td width="50%">Country</td>
                <td width="50%">Gold Medals</td>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($top5 as $country=>$count): ?>
                <tr>
                    <td><?php echo $country; ?></td>
                    <td><?php echo $count; ?></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<div class="panel">
    <div class="panel-header">
        Which countries won the most silver medals?
    </div>
    <div class="panel-body">
        <?php
        $sql =
            "SELECT country.country_name, athlete_medal.medal_count
               FROM country
              INNER 
               JOIN athlete 
                ON country.country_id = athlete.country_id
              INNER 
               JOIN athlete_medal 
                ON athlete.athlete_id = athlete_medal.athlete_id
               INNER 
                JOIN medal  
                 ON athlete_medal.medal_id = medal.medal_id
                  AND medal.medal_name='silver'";
        $table = $database->executeQuery($sql);
        $medal_count = [];
        foreach ($table as $item) {
            if(!isset($medal_count[$item['country_name']]))
                $medal_count[$item['country_name']] = 0;
            $medal_count[$item['country_name']] += $item['medal_count'];
        }
        arsort($medal_count);
        $top5 = array_slice($medal_count,0,5,true);
        ?>
        <table cellspacing="0" cellpadding="0">
            <thead>
            <tr>
                <td width="50%">Country</td>
                <td width="50%">Silver Medals</td>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($top5 as $country=>$count): ?>
                <tr>
                    <td><?php echo $country; ?></td>
                    <td><?php echo $count; ?></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<div class="panel">
    <div class="panel-header">
        Which countries won the most bronze medals?
    </div>
    <div class="panel-body">
        <?php
        $sql =
            "SELECT country.country_name, athlete_medal.medal_count
               FROM country
              INNER 
               JOIN athlete 
                ON country.country_id = athlete.country_id
              INNER 
               JOIN athlete_medal 
                ON athlete.athlete_id = athlete_medal.athlete_id
               INNER 
                JOIN medal  
                 ON athlete_medal.medal_id = medal.medal_id
                  AND medal.medal_name='bronze'";
        $table = $database->executeQuery($sql);
        $medal_count = [];
        foreach ($table as $item) {
            if(!isset($medal_count[$item['country_name']]))
                $medal_count[$item['country_name']] = 0;
            $medal_count[$item['country_name']] += $item['medal_count'];
        }
        arsort($medal_count);
        $top5 = array_slice($medal_count,0,5,true);
        ?>
        <table cellspacing="0" cellpadding="0">
            <thead>
            <tr>
                <td width="50%">Country</td>
                <td width="50%">Bronze Medals</td>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($top5 as $country=>$count): ?>
                <tr>
                    <td><?php echo $country; ?></td>
                    <td><?php echo $count; ?></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<div class="panel">
    <div class="panel-header">
        Which countries won the most medals?
    </div>
    <div class="panel-body">
        <?php
        $sql =
            "SELECT country.country_name, athlete_medal.medal_count
               FROM country
              INNER 
               JOIN athlete 
                ON country.country_id = athlete.country_id
              INNER 
               JOIN athlete_medal 
                ON athlete.athlete_id = athlete_medal.athlete_id
               INNER 
                JOIN medal  
                 ON athlete_medal.medal_id = medal.medal_id";
        $table = $database->executeQuery($sql);
        $medal_count = [];
        foreach ($table as $item) {
            if(!isset($medal_count[$item['country_name']]))
                $medal_count[$item['country_name']] = 0;
            $medal_count[$item['country_name']] += $item['medal_count'];
        }
        arsort($medal_count);
        $top5 = array_slice($medal_count,0,5,true);
        ?>
        <table cellspacing="0" cellpadding="0">
            <thead>
            <tr>
                <td width="50%">Country</td>
                <td width="50%">Medals</td>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($top5 as $country=>$count): ?>
                <tr>
                    <td><?php echo $country; ?></td>
                    <td><?php echo $count; ?></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<div class="panel">
    <div class="panel-header">
        What is the average height of a swimmer?
    </div>
    <div class="panel-body">
        <?php
        $sql =
            "SELECT athlete.height_cm FROM athlete
INNER JOIN athlete_event on athlete.athlete_id = athlete_event.athlete_id
INNER JOIN olympic_event on athlete_event.event_id = olympic_event.event_id
INNER JOIN sport on olympic_event.sport_id = sport.sport_id
WHERE sport.sport_name = 'Swimming'";
        $table = $database->executeQuery($sql);
        $heightTotal = 0;
        foreach ($table as $height) {
            $heightTotal += $height['height_cm'];
        }
        $swimmerCount = count($table);
        echo round($heightTotal/$swimmerCount, 2) . " cm";
        ?>
    </div>
</div>