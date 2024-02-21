<table class="table table-striped table-responsive">
    <thead>
        <th>Modell</th>
        <th>Gyorsítás</th>
        <th>WLTP</th>
        <th>Ülések</th>
    </thead>
    <tbody>
        <?php 
        $orderedCars = $cars;
        function cmp($a, $b) {
            return strcmp($a->model, $b->model);
        }        
        usort($orderedCars, "cmp");             
        foreach($orderedCars as $index => $car): ?>
        <?php 
        if($query == null || mb_strtolower(explode(' ',$car->model)[1]) == $query): ?>
        <tr>
            <td><?=$car->model?></td>
            <td><?=$car->acceleration?> s</td>
            <td><?=$car->wltp?> km</td>
            <td><?=$car->seats?></td>
        </tr>
        <?php endif ?>
        <?php endforeach ?>
    </tbody>
</table>