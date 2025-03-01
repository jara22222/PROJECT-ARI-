<?php
include("../database/database.php");   
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Sidebar</title>

    <!-- External CSS & Fonts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200..1000;1,200..1000&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!-- External JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Custom CSS -->
    <link rel="stylesheet" href="../designs/style.css">
</head>

<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <div class="logo-container">
            <img src="../IMAGES/sidebar_logo.png" class="logo-img" alt="Admin">
            <div class="logo-details">
                <h5 class="brand">Blacksnow Café </h5>
            </div>
        </div>

        <div class="container menu-container">
 <ul>
                    <h6 class="menu-title">Actions</h6>
                    <li><i class="fas fa-chart-line"></i> <span>Dashboard</span></li>
                    <li><i class="fas fa-users"></i> <span>Employee</span></li>
                    <li><i class="bi bi-person-lines-fill"></i></i> <span>Roles</span></li>
                    <li><i class="bi bi-building"></i><span>Suppliers</span></li>
                    <li><i class="bi bi-plus-square"></i><a href="add_product.php"><span>Add products</span></a></li>


                    <li class="dropdown" onclick="toggleDropdown(this,event)">
                        <i class="bi bi-view-stacked"></i>
                        <span class="dropdown-text">View Products</span>
                        <i class="fas fa-chevron-right arrow-icon"></i>
                        <ul class="dropdown-menu">
                            <li><a class="text-truncate" href="../product/coffee.php">View Coffee</a></li>
                            <li><a class="text-truncate" href="../product/pastry.php">View Pastry</a></li>
                            <li><a class="text-truncate" href="../product/rice_meal.php">View Rice Meal</a></li>
                        </ul>
                    </li>

                    <li><i class="fas fa-chart-pie"></i> <span>Reports</span></li>
                    <li><i class="fas fa-wallet"></i> <span>Transactions</span></li>
                </ul>
            <ul class="settings-container">
                <h6 class="menu-title text-truncate px-3">Appearance</h6>
                <li class="toggle-item">
                    <div class="toggle-switch" onclick="toggleDarkMode()"></div>
                </li>
                <li><i class="fas fa-sign-out-alt"></i> <span>Logout</span></li>
            </ul>

            <div class="profile-container">
                <img src="../IMAGES/girl.jpg" class="profile-img" alt="Admin">
                <div class="profile-details">
                    <h5 class="name">Name Admin</h5>
                    <h6 class="role">Administrator</h6>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="main-content px-5">
        <div class="container-fluid mt-3">
            <div class="row">
                <div class="col d-flex justify-content-end align-items-center">
                    <div class="search-container position-relative">
                        <form class="d-flex align-items-center">
                            <i class="fas fa-search search-icon"></i>
                            <input class="form-control search-input ps-5" type="search" placeholder="Search anything..."
                                aria-label="Search">
                            <button class="btn btn-search ms-2" type="submit">Search</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Dummy Content for Scroll -->
        <div class="content">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Corporis atque ratione reprehenderit temporibus,
            veritatis sapiente recusandae officia impedit inventore fugit, esse omnis, sed nostrum aspernatur totam quas
            fuga tenetur laudantium!
            Id magni eum iusto, doloribus nostrum facere natus veritatis et sit officiis. Natus voluptate aliquid,
            fugiat vitae provident ut magni ad rerum, laboriosam praesentium, commodi odit non consequuntur quidem
            magnam?
            Molestiae fugit nisi quibusdam suscipit quos amet provident dolores dolorum! Odit animi ex eos, expedita
            ipsam consequuntur ad corporis qui, distinctio deserunt similique deleniti porro recusandae necessitatibus
            architecto, veritatis quasi?
            Illum assumenda, amet ipsa inventore animi magni voluptatum facilis impedit placeat alias, earum sint sunt
            officiis provident qui veritatis esse officia dolores? Aspernatur itaque laborum labore molestias ipsum
            officiis facere.
            Quasi molestias minima id ratione fugiat tempora modi ipsa repellat voluptatum consequatur. Facere magni
            aperiam nisi cupiditate nesciunt amet, in ipsam sapiente itaque accusamus eligendi officiis, maiores laborum
            asperiores illum!
            Voluptates quia nemo illum, nobis id repellat, iusto adipisci dolores sunt minima laboriosam expedita? Iusto
            necessitatibus accusantium, placeat beatae temporibus deleniti dolorum at harum dicta inventore illum
            quisquam mollitia debitis!
            Unde aliquid sit suscipit, omnis ut labore iste odit ratione. Asperiores expedita enim ea sint corrupti eum
            illo commodi odit animi. Temporibus nesciunt facere molestias aperiam qui impedit ex voluptates.
            Deserunt maiores sequi esse corporis animi laudantium error autem sapiente recusandae? Corrupti, veritatis
            laborum neque velit consequatur optio, adipisci unde inventore illo est tempore. Aperiam repellat natus
            iusto hic distinctio!
            Quisquam porro dignissimos beatae dolore et laudantium cumque exercitationem eaque! Fuga assumenda dolorem
            ab quod alias earum magnam blanditiis velit, vel suscipit, asperiores, dicta molestiae ipsam quo reiciendis
            error amet.
            Eos inventore neque laboriosam fuga, placeat voluptates at totam facilis nihil id est nisi nam earum quas
            repudiandae dolore ad rem soluta quasi? Provident vero, asperiores impedit dignissimos placeat ut.
            Minus perferendis dolorem quidem odit alias, labore voluptatem ullam quam. Odio, commodi necessitatibus
            sapiente adipisci aperiam velit tempore praesentium eum alias culpa. Tempora fugiat quisquam id aut
            doloremque odio nesciunt.
            Itaque aperiam obcaecati perspiciatis porro voluptatem totam sint, sed enim tempore saepe doloribus ad eaque
            repudiandae quis ipsum explicabo alias omnis aliquam. Deserunt minus est modi libero obcaecati totam aut.
            Impedit, eos? Rem adipisci dignissimos dolorem soluta enim labore libero quae obcaecati itaque sint
            doloribus iure beatae ipsam unde qui quia, aut eos. Inventore sunt neque, quam cumque vitae iusto.
            In quos omnis molestias error quidem perferendis quas at rem, accusantium autem tenetur ipsam eligendi
            tempora doloribus facere vel labore eum qui natus impedit ullam eius eveniet ut minus. Architecto.
            Incidunt in repudiandae suscipit inventore tenetur voluptatem fugit expedita similique illo. Minus sequi
            dolores temporibus aspernatur fuga perspiciatis, alias tempora voluptatibus debitis delectus vitae id, quia
            recusandae et corrupti esse!
            Corporis tempore harum possimus sed inventore, ex earum distinctio doloremque temporibus consequuntur
            doloribus voluptatum? Expedita nemo consequatur corporis, modi, quia explicabo impedit fuga aliquid omnis
            earum ad hic porro libero.
            Explicabo, distinctio id. Ad ratione quas aliquam provident accusantium, modi necessitatibus vel repellat
            quis ex quos autem officiis voluptatem iusto, ipsum pariatur officia quibusdam quae, alias non? Veniam,
            veritatis molestiae.
            Repellendus, id dolorum. Tempore voluptatem delectus ratione. Officia, et nihil nobis animi assumenda ullam,
            adipisci neque repellendus eaque amet praesentium tenetur dicta dolores velit ipsum quasi nostrum corporis
            ducimus. Fuga?
            Numquam praesentium impedit, reprehenderit cumque inventore veniam maxime dicta sequi animi neque? Aliquid
            accusantium numquam distinctio, reprehenderit ex nemo quaerat incidunt labore earum deserunt ipsa nulla fuga
            dolorem. Aut, ullam!
            Eos ipsa porro laudantium aliquam nostrum est ab sequi? Expedita, cumque facere consectetur in accusamus
            minima dicta alias veniam voluptas ipsa tenetur architecto pariatur sed doloribus quasi beatae sint
            voluptatum.
            Quidem sint voluptate officia suscipit in a, delectus libero laborum molestiae quod veniam laudantium
            quisquam ab ipsum dolore expedita sapiente ipsam rerum quibusdam aut! Unde doloribus molestias corrupti
            alias! Quis.
            Consectetur qui, maiores quod facere minus nemo beatae reprehenderit ipsa eius numquam ducimus inventore
            nostrum quis, illo impedit reiciendis ex voluptatum? Iste, pariatur eaque ullam provident facere esse magnam
            veritatis!
            Repudiandae, blanditiis. Iure quae reprehenderit quidem dolorem dolor nostrum repudiandae nobis incidunt
            modi sint? Distinctio est accusamus consequatur modi minima, nisi cumque, itaque doloribus ipsum quam,
            accusantium ad delectus alias.
            Dicta autem deserunt tempore, cum sapiente voluptas est dolor quasi neque esse quam id nobis sed eos enim
            assumenda culpa maxime omnis animi quibusdam itaque cumque iste accusantium necessitatibus! Quasi.
            Deleniti repellendus doloribus, commodi voluptate nemo incidunt veniam exercitationem voluptatum obcaecati!
            Nostrum rerum tempore nemo quisquam accusantium ut sint, corrupti cumque quae esse nesciunt? Rerum hic porro
            fugiat id corrupti.
            Magnam dolore magni, voluptatibus ad quam nostrum maiores dicta nisi deleniti quo! Culpa ipsa voluptate
            inventore mollitia error nostrum vitae perspiciatis voluptates corporis deserunt! Deserunt pariatur officia
            repudiandae corporis at!
            Enim tenetur ipsam, itaque excepturi voluptas eligendi fuga vitae consequuntur voluptate quod perferendis
            laboriosam ratione autem eaque cupiditate adipisci. Alias voluptatibus, et delectus ea tempora saepe in
            harum tenetur blanditiis!
            Recusandae at et quibusdam, distinctio optio labore nulla eligendi quasi quos asperiores soluta maiores
            ducimus, eum facilis ipsum doloremque libero mollitia nihil harum? Vel repellat ut repellendus, veritatis
            deleniti pariatur.
            Alias modi iusto numquam esse possimus doloremque hic ullam quidem quis quam, enim quisquam totam, porro
            velit sapiente placeat. Eum dolores, praesentium magnam iure esse illo eligendi corrupti veniam voluptate?
            Accusantium blanditiis, molestias voluptatibus praesentium eligendi perferendis voluptate distinctio atque
            ipsam quis dolorem fugit rerum, aspernatur magni. Et molestiae, accusantium sed, aliquam repellat reiciendis
            ea sunt vitae modi dolorem itaque!
            Ipsam, nesciunt provident amet perspiciatis ducimus delectus nemo esse est voluptatum nostrum facilis
            cupiditate temporibus eum magni fugiat impedit. Ab temporibus laborum sapiente sed totam atque id a deserunt
            nulla.
            Doloribus sint cupiditate quaerat eum saepe quam explicabo quisquam velit ab nulla, quod, dicta sequi
            distinctio repudiandae minima molestias eos reiciendis ea. Odit ad omnis ipsam, provident fugiat dolore
            nobis!
            Eius voluptates reprehenderit dignissimos aut deleniti nam nesciunt hic libero animi, ipsam repudiandae,
            assumenda ab tempora dolorem consequatur voluptatibus. Consectetur accusamus aliquid exercitationem soluta
            commodi dolores, laboriosam non ipsam maiores!
            Minus alias suscipit incidunt iusto accusantium at velit animi expedita facere praesentium tempora odio
            rerum eius, quaerat magni explicabo non quas impedit quo et aperiam deleniti eaque dolores quibusdam. Dicta!
            Ullam laudantium incidunt hic nisi assumenda ipsam! Sapiente repellat dignissimos eos accusamus ipsum
            consequuntur dolorum architecto numquam. Minus fugit dicta voluptate. Architecto est ratione debitis quod,
            at modi consectetur distinctio!
            Expedita corrupti illo unde tempore esse deserunt neque similique officia dolorem quam beatae earum quisquam
            eum cumque accusamus consectetur quia, accusantium atque quibusdam. Tempore a praesentium provident minima
            ipsum facilis?
            Aspernatur, quibusdam. Explicabo ipsum mollitia consequatur nam iste reiciendis sapiente ad! Excepturi fuga
            omnis ad earum rem veritatis cum facere similique natus modi quisquam illo reprehenderit ex quis, voluptate
            qui.
            Distinctio sed ipsa quisquam quia fugiat officia fuga dignissimos ex totam, officiis quam pariatur. Quia
            sint, adipisci perspiciatis excepturi molestiae delectus recusandae est quibusdam hic illo corrupti
            similique, explicabo voluptatibus.
            Voluptatibus saepe officia id autem minima temporibus eius nisi laborum labore a. Alias corporis hic, porro
            officia temporibus non repellat quos quae. Delectus porro vitae, odit harum reiciendis vero laborum.
            Earum, dolor eos esse ipsam nobis repudiandae atque consectetur, rerum qui inventore nihil deserunt!
            Voluptate eos, porro est vitae ut consequuntur laboriosam placeat excepturi exercitationem possimus
            perspiciatis at laudantium perferendis?
            Dolorum ut aut numquam repellendus eos accusantium maxime possimus debitis animi. Sit tenetur hic corrupti
            temporibus distinctio magnam veritatis delectus ut magni! Illo totam odit, repudiandae necessitatibus
            impedit voluptates molestias.
            Dolor earum doloribus distinctio modi adipisci, incidunt ut atque minus voluptatem aperiam omnis quod!
            Itaque ex, corrupti inventore dicta nostrum soluta suscipit id, eaque laborum consequuntur magni temporibus!
            Similique, unde!
            Quae eos quas unde officia! Modi odio quia, quas rem fugiat doloremque aliquam. Voluptatum quidem dolores
            quis quasi sint asperiores hic veritatis minus rem, accusamus corporis similique dicta corrupti vero?
            Perferendis quam consequatur tempora quia, autem totam nesciunt ad, ipsam nam saepe, enim modi? Impedit
            dicta expedita, perferendis ea, dignissimos labore eveniet animi quia, nam sint cum aut provident non?
            Nisi voluptates beatae ipsa! Esse, voluptatem. Voluptas perferendis veritatis temporibus, voluptates alias
            nostrum deleniti ratione ipsum. A explicabo minima accusamus vitae ut cumque? Inventore aliquid facere quam
            aut dolores reiciendis.
            Quidem id quaerat iste deserunt eligendi libero inventore numquam optio similique explicabo reiciendis,
            corrupti quibusdam modi accusantium pariatur nulla ad. Harum molestiae ipsa, non dolorem quae est sit
            quisquam veniam?
            Aliquid nihil hic distinctio impedit amet aut animi, vitae repellendus minus? Et iure, perferendis ea
            explicabo repudiandae ex praesentium laudantium, molestias accusamus quo pariatur optio dolorem fugiat quos
            dolor quod?
            Voluptates quasi enim distinctio labore error dicta quis magni! Deserunt perferendis cumque labore, tenetur
            quod unde quo totam, cupiditate, necessitatibus voluptatum aspernatur atque illum corrupti eligendi?
            Corrupti eligendi deserunt sit.
            Ex, inventore accusamus animi aperiam perferendis harum voluptatibus dolores, nemo laborum laboriosam ipsa
            quia similique ducimus id blanditiis deleniti officia ad. Asperiores obcaecati ea recusandae! Sunt quibusdam
            perspiciatis sit ab.
            Ab similique assumenda, iste natus laudantium soluta! Necessitatibus ratione ipsum ex repellendus nemo
            maxime dignissimos voluptas officia a cumque doloremque praesentium ipsam quae in, voluptatibus velit
            recusandae pariatur esse commodi.
        </div>
    </div>

    <script>

        function toggleDarkMode() {
            document.body.classList.toggle("dark-mode");
        }

        function toggleDropdown(element, event) {


            // Toggle the 'active' class
            element.classList.toggle("active");


            let dropdownMenu = element.querySelector(".dropdown-menu");
            if (dropdownMenu) {
                dropdownMenu.style.display = dropdownMenu.style.display === "block" ? "none" : "block";
            }


            let arrowIcon = element.querySelector(".arrow-icon");
            if (arrowIcon) {
                arrowIcon.classList.toggle("rotated");
            }
        }


    </script>

</body>

</html>