<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<section>
    <div class="container">
        <div id="content">
            <ul>
            <?php 
            for($i=0; $i < count($content['project']); $i++) {
                echo '<li>';
                $project = $content['project'][$i];
                echo $project->nama . '<br/>';
                echo $project->deskripsi . '<br/>';

                echo 'RP ' . number_format ($project->nilai_saham, 0, ",", "." ) . '<br/>';
                echo number_format ($project->slot_saham, 0, ",", "." ) . '<br/>';
                echo '</li>';
            }
            ?>
            </ul>
        </div>
    </div>
</section>