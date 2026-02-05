<div class="container">
    <div class="page-inner">
        
        <div class="page-header">
            <h3 class="fw-bold mb-3"><?= $title ?></h3>
            <ul class="breadcrumbs mb-3">
                <li class="nav-home">
                    <a href="dashboard">
                        <i class="icon-home"></i>
                    </a>
                </li>
                <li class="separator">
                    <i class="icon-arrow-right"></i>
                </li>
                <?php 
                $lastKey = array_key_last($directory); 
                foreach ($directory as $key => $R) {
                    $url = $R['data']->is_module == 1 ? $R['data']->url : '#';
                    echo '<li class="nav-item">
                            <a href="'.$url.'">' . htmlspecialchars($R['label']) . '</a>
                        </li>';
                    if ($key !== $lastKey) {
                        echo '<li class="separator">
                                <i class="icon-arrow-right"></i>
                            </li>';
                    }
                }
                ?>
            </ul>
        </div>

        <?= $content ?>
    </div>
</div>