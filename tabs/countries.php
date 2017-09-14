<div class="panel">
    <div class="panel-header">
        Countries
    </div>
    <div class="panel-body">
        <?php $countries = ($database->select('country_name, gdp_per_capita, life_expectancy', 'country')); ?>
        <table cellspacing="0" cellpadding="0">
            <thead>
            <tr>
                <td width="33.333%">Name</td>
                <td width="33.333%">GDP Per Capita</td>
                <td width="33.333%">Life Expectancy</td>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($countries as $country): ?>
                <tr>
                    <td><?php echo $country['country_name']; ?></td>
                    <td><?php echo $country['gdp_per_capita']; ?></td>
                    <td><?php echo $country['life_expectancy']; ?></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>