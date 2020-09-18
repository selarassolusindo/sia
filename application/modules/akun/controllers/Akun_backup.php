<!-- klasifikasi akun -->
<li class="nav-item has-treeview
    <?php
    switch ($this->uri->segment(1)) {
        case 'akun':
            echo 'menu-open';
            break;
        default:
            echo '';
    }
    ?>
">
    <a href="#" class="nav-link">
        <i class="far fa-clone nav-icon"></i>
        <p>Klasifikasi Akun<i class="right fas fa-angle-left"></i></p>
    </a>
    <ul class="nav nav-treeview">
        <!-- akun level 1 -->
        <li class="nav-item">
            <a href="<?php echo site_url('akun/l1'); ?>" class="nav-link <?php echo ($this->uri->segment(1) == 'akun' and $this->uri->segment(2) == 'l1') ? 'active' : ''; ?>">
                <i class="fas fa-dice-one nav-icon"></i>
                <p>Akun Level-1</p>
            </a>
        </li>
        <!-- akun level 2 -->
        <li class="nav-item">
            <a href="<?php echo site_url('akun/l2'); ?>" class="nav-link <?php echo ($this->uri->segment(1) == 'akun' and $this->uri->segment(2) == 'l2') ? 'active' : ''; ?>">
                <i class="fas fa-dice-two nav-icon"></i>
                <p>Akun Level-2</p>
            </a>
        </li>
        <!-- akun level 3 -->
        <li class="nav-item">
            <a href="<?php echo site_url('akun/l3'); ?>" class="nav-link <?php echo ($this->uri->segment(1) == 'akun' and $this->uri->segment(2) == 'l3') ? 'active' : ''; ?>">
                <i class="fas fa-dice-three nav-icon"></i>
                <p>Akun Level-3</p>
            </a>
        </li>
        <!-- akun level 4 -->
        <li class="nav-item">
            <a href="<?php echo site_url('akun/l4'); ?>" class="nav-link <?php echo ($this->uri->segment(1) == 'akun' and $this->uri->segment(2) == 'l4') ? 'active' : ''; ?>">
                <i class="fas fa-dice-four nav-icon"></i>
                <p>Akun Level-4</p>
            </a>
        </li>
        <!-- akun level 5 -->
        <li class="nav-item">
            <a href="<?php echo site_url('akun/l5'); ?>" class="nav-link <?php echo ($this->uri->segment(1) == 'akun' and $this->uri->segment(2) == 'l5') ? 'active' : ''; ?>">
                <i class="fas fa-dice-five nav-icon"></i>
                <p>Akun Level-5</p>
            </a>
        </li>
        <!-- klasifikasi akun -->
        <li class="nav-item">
            <a href="<?php echo site_url('akun/l6'); ?>" class="nav-link <?php echo ($this->uri->segment(1) == 'akun' and $this->uri->segment(2) == 'l6') ? 'active' : ''; ?>">
                <i class="fas fa-dice-five nav-icon"></i>
                <p>Klasifikasi Akun</p>
            </a>
        </li>
        <!-- klasifikasi akun #2 -->
        <li class="nav-item">
            <a href="<?php echo site_url('akun/l5_2'); ?>" class="nav-link <?php echo ($this->uri->segment(1) == 'akun' and $this->uri->segment(2) == 'l5_2') ? 'active' : ''; ?>">
                <i class="fas fa-dice-five nav-icon"></i>
                <p>Klasifikasi Akun #2</p>
            </a>
        </li>
        <!-- klasifikasi akun #3 -->
        <li class="nav-item">
            <a href="<?php echo site_url('akun/l5_3'); ?>" class="nav-link <?php echo ($this->uri->segment(1) == 'akun' and $this->uri->segment(2) == 'l5_3') ? 'active' : ''; ?>">
                <i class="fas fa-dice-five nav-icon"></i>
                <p>Klasifikasi Akun #3</p>
            </a>
        </li>
    </ul>
</li>
