            <header>
                <div class="container">
                    <h1 class="logo">
                        <a href="index.html" style="font-family: Segoe UI;color:E00404;">
                            <img src="<?php echo base_url('assets') ?>/img/logo.png" width="40"><i style="color:red;font-family:segoe ui;"><?php echo $title; ?></i>
                            <br>
                            <div align="center"><small style="font-size:15px; color:black;"><i><?php echo $stitle; ?></i></small></div>
                        </a>
                    </h1>
                    <div class="navbar-collapse nav-main-collapse collapse">
                        <div class="search" id="headerSearch">
                        <form>
                            <input type="text" name="search" id="search" placeholder="Search" style="padding: 13px; border: solid 1px #ccc; border-radius: 0; font-family: Segoe UI; background: #fff;">
                        </form>
                        </div>
                        <nav class="nav-main mega-menu">
                            <ul class="nav nav-pills nav-main" id="mainMenu">
                                <li>
                                    <?php echo anchor('','Home','style="color:black;"') ?>
                                </li>

                                <li class="dropdown">
                                    <a class="dropdown-toggle" href="#" style="color:black;">
                                       About Us
                                        <i class="icon icon-caret-down"></i>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li><?php echo anchor('about/profile','Profile') ?></li>
                                        <li><?php echo anchor('about/team','Team') ?></li>
                                    </ul>
                                </li>

                                    <?php foreach ($menu->result() as $menu => $torMenu) {
                                    ?>    
                                    <li>
                                        <?php echo anchor($torMenu->tor_link_menu,$torMenu->tor_menu,'style="color:black;"') ?>
                                    </li>
                                <?php } ?>
                                <li class="dropdown">
                                    <a class="dropdown-toggle" href="#" style="color:black;">
                                        Portofolio
                                        <i class="icon icon-caret-down"></i>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <?php foreach ($category->result() as $cat => $catItem) {
                                        $cat = underscore($catItem->category);
                                        echo "<li>";
                                        echo anchor('home/pages/category/'.$cat,$catItem->category);
                                        echo "</li>";
                                        }
                                        ?>
                            </ul>
                        </nav>
                    </div>
                </div>
            </header>