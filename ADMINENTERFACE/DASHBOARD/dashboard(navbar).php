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
    <link rel="stylesheet" href="../DESIGNS/style.css">
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

                <li class="dropdown" onclick="toggleDropdown(this)">
                    <i class="fas fa-bars"></i>
                    <span class="dropdown-text">Products</span>
                    <i class="fas fa-chevron-right arrow-icon"></i>
                    <ul class="dropdown-menu">
                        <li><a class="text-truncate" href="#">Manage products</a></li>
                        <li><a class="text-truncate" href="#">Product sales</a></li>
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
    <div class="main-content">
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
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Quia in consequuntur necessitatibus expedita
            dolorem laborum, magni sapiente fugiat soluta non doloremque nobis odio repellendus iure similique ut eaque.
            Impedit, labore!
            Cum facilis, labore omnis aut ipsa minus deserunt voluptatem sequi alias eos a veritatis accusantium
            voluptate, eligendi aliquam ullam. Totam recusandae repellendus, beatae ad consequuntur dolorem id unde
            inventore dignissimos.
            Perspiciatis sint doloremque optio necessitatibus vel laboriosam eum, dolore ipsa nemo explicabo eos
            officiis quisquam animi magnam sunt molestias aliquid eius officia distinctio accusantium, natus maiores quo
            aut. Magnam, fuga!
            Recusandae voluptate magni repellendus quisquam velit, consectetur dolor commodi rerum, accusantium hic
            voluptatibus repudiandae nemo cupiditate error illo amet nobis exercitationem ad, reiciendis perspiciatis
            iusto enim omnis iure ipsa! Illum?
            Aperiam, iste animi. Perspiciatis, iure? Dolore, repellat nulla optio illo debitis, sequi accusamus ullam
            totam ea esse at ex autem cumque aperiam veniam laboriosam dolorum praesentium obcaecati molestiae
            consequatur voluptas?
            Consectetur sapiente, voluptatem consequatur maxime quasi quae fugiat eaque, esse, amet id cum odit tenetur
            laudantium ea vitae enim atque? Consequuntur enim architecto quas aut repudiandae est facere minus placeat.
            Nulla, ipsa eaque? Recusandae optio doloremque facilis a quo quisquam, officiis reiciendis. Libero vero
            dicta blanditiis, in magnam magni labore modi iure suscipit beatae cum nemo, voluptatum dignissimos maxime
            praesentium.
            Sequi neque illo eum. Enim, beatae adipisci, facilis recusandae dolor sequi est voluptas voluptate
            reiciendis accusantium accusamus delectus ducimus possimus at. Itaque, ad! Dolore voluptatum dolorum aliquid
            voluptates, id vero.
            Adipisci quisquam ipsum dolorem, voluptas molestiae temporibus facere perspiciatis sunt modi voluptatum
            optio ea dicta eveniet maxime, hic laudantium? At voluptatibus reprehenderit dolorem cumque temporibus rem
            neque veniam. Modi, aliquam.
            Magnam, totam voluptatum fugiat voluptatibus porro labore autem tenetur quasi fuga ullam. Ad libero autem
            ipsum ullam iste similique sit, rerum consequuntur nam accusamus, ratione quae voluptas, officia dolorum
            laborum.
            Sit laudantium cupiditate molestiae adipisci error molestias dicta? Nesciunt similique placeat veniam
            tempore? Eum illo aspernatur accusamus maiores, incidunt amet expedita nesciunt natus rem distinctio ex
            reprehenderit, modi iusto. Sint?
            Dignissimos esse deleniti adipisci error atque obcaecati alias odio officiis! Ducimus optio culpa minima
            cum. Modi perferendis deleniti et ad temporibus impedit ratione, explicabo libero, quod sint beatae
            voluptates quibusdam.
            Accusamus, vel vero id architecto perferendis nemo quae et facere fugit mollitia voluptatem, ab velit omnis
            iste aut quaerat, itaque facilis quasi dolorum ut! Suscipit sunt esse maiores aut ipsa!
            Ipsa reiciendis, voluptatibus, ea molestiae nihil ducimus itaque consectetur error atque, enim possimus
            voluptas quo. Soluta ea placeat explicabo at minus reiciendis provident facilis libero! Voluptatum earum
            laudantium ut sit.
            Ducimus maxime voluptas deleniti velit minima ratione deserunt incidunt, est quam adipisci illo suscipit
            excepturi voluptates illum tenetur distinctio. Id aliquid neque animi aperiam facere sunt odio atque quam
            assumenda?
            Ad veritatis reiciendis quos enim impedit minima sit incidunt, corporis recusandae, officiis non obcaecati
            voluptate mollitia nulla aliquam eaque explicabo aliquid laboriosam, quas facere ipsa? Nam molestiae eum
            facere commodi!
            Esse voluptatem, quasi placeat provident dolorum, mollitia incidunt ipsam amet in autem, qui asperiores
            labore ipsa. Eaque, facilis! Exercitationem eum rerum repellendus eveniet nam, quam dolor est vel explicabo
            aliquam.
            Et esse sequi odit voluptatem illo in dolorem eveniet, temporibus mollitia ipsa libero provident enim
            corrupti rerum voluptas vitae velit hic consectetur dolore. Dolores asperiores nesciunt temporibus odio
            vero. Consequuntur?
            Dolorum consequuntur facilis quisquam iure magni accusantium, harum nobis voluptatum neque. Aliquam,
            necessitatibus velit tempore eos iure voluptates impedit placeat. Debitis cupiditate consequatur ratione
            iste beatae corrupti deleniti voluptate esse.
            Sint maiores facere assumenda quae sed, officia excepturi quibusdam! Asperiores quasi totam adipisci,
            doloremque incidunt culpa ea explicabo sit corporis suscipit, reprehenderit quaerat assumenda a saepe hic at
            aliquid molestias.
            Porro, similique impedit distinctio modi harum corrupti. In suscipit, dignissimos asperiores vero
            voluptatibus quis quae minima earum libero sequi eligendi perferendis inventore nisi, a ullam velit tempora,
            mollitia nam alias!
            Enim, voluptas explicabo! Nulla tempora officiis cum veritatis ipsa! Harum alias eius, nesciunt praesentium
            unde maiores delectus inventore, deserunt, vel soluta ad libero nulla assumenda provident aliquid impedit.
            Vitae, ducimus!
            Corporis nobis perspiciatis nemo blanditiis non optio, tempora mollitia, illum dignissimos beatae alias
            nihil unde ullam quas veritatis, laboriosam sapiente ducimus atque doloremque ipsa facere. Qui veniam dicta
            accusantium illum.
            Quam a ut voluptate minus? Nihil error, suscipit omnis tenetur tempora accusantium nam, esse exercitationem
            ad doloremque sint in earum et eos amet dolor sunt quasi deleniti voluptatibus dignissimos alias?
            Sed nobis voluptate ad maxime maiores, magni laborum amet totam deserunt. Molestias, quidem dolores.
            Expedita iste accusantium ex! Quia sed temporibus et reiciendis cumque culpa ipsum porro. Neque, fugit
            ullam!
            Accusamus saepe, reprehenderit vel odit quibusdam, id recusandae vero cumque, ut velit officiis minima
            voluptate minus repellat. Assumenda est aliquid sequi a impedit ipsam, cum, eum quo voluptas esse eius.
            Qui officia ipsa sequi at, veniam, quo nemo laborum quaerat ab illo incidunt provident, dolorem unde non!
            Doloremque aspernatur veritatis quas harum ab asperiores, repellat modi molestiae dolor delectus facere!
            Vero ratione magnam praesentium impedit. Ex nesciunt sunt hic impedit reiciendis voluptas in dolorem, quia,
            voluptate minima eaque asperiores eos corporis eius autem nostrum quibusdam debitis vero iure fugit sit.
            Voluptatibus perspiciatis nostrum, necessitatibus rem modi tempore ab quae rerum illo voluptatum voluptate
            est nisi quisquam asperiores cumque, laudantium odit amet quibusdam! Reprehenderit ab quidem ea assumenda
            est debitis ipsa.
            Rem necessitatibus alias fuga expedita quis facere, numquam excepturi earum, dicta obcaecati est. Id
            praesentium accusamus excepturi obcaecati ut repellendus. Dolores asperiores praesentium delectus adipisci
            tempore consequatur ex velit voluptate.
            Facere cum fuga voluptates distinctio obcaecati nobis, veniam ut modi vero nulla! Impedit voluptates aliquam
            molestiae, fugiat laborum voluptatum nulla rem ullam blanditiis maxime, doloremque eius quas suscipit
            voluptate rerum.
            Quibusdam consequatur, porro suscipit maiores voluptas, harum dolor non quidem illo architecto voluptatum
            itaque est facere a autem ratione veniam. Numquam, nisi facilis perspiciatis aspernatur voluptatibus earum
            porro. Aperiam, debitis?
            Tempore facere modi nisi dicta voluptas tenetur. Ducimus, repudiandae sed sequi sapiente inventore quos
            reprehenderit eos suscipit velit alias vel cumque ex accusamus incidunt necessitatibus perspiciatis? Unde
            quos laudantium fugit.
            Provident a amet quidem eaque tempora modi aliquam numquam quia quas minima iste, corrupti error officiis
            nam velit nesciunt nobis possimus laboriosam consequuntur dignissimos cumque facilis consequatur explicabo!
            Reiciendis, corrupti!
            Iste asperiores eveniet praesentium quas incidunt distinctio tenetur nam quam consequuntur optio! Quasi
            aliquam ducimus iste labore? Vero, aliquid nisi ea harum, mollitia commodi porro velit rerum eaque ipsa
            blanditiis?
            Quod debitis sunt odio qui consequuntur dolorem voluptate at aut autem omnis ipsum cumque reiciendis,
            numquam magni error molestiae magnam sed laboriosam, blanditiis repellat itaque id aperiam. Ducimus, libero.
            Autem.
            Aperiam quos sapiente optio incidunt commodi consectetur laborum ipsum modi amet nam harum, minima
            reiciendis dicta nulla fugit. Id magni quod autem distinctio earum cum suscipit animi sequi, recusandae
            labore?
            Officiis sunt autem earum facilis asperiores, quaerat eaque ea. Delectus rem doloremque molestias reiciendis
            tempora a reprehenderit debitis neque labore facere fugiat accusamus asperiores hic nihil natus voluptate,
            aspernatur ducimus!
            Exercitationem dolorem labore illo optio officia eos eum ipsum, accusantium ipsa aliquid natus delectus
            voluptatum? Quibusdam quos aperiam, quasi velit porro commodi dolorum rem nulla, facere asperiores non
            mollitia ea!
            Repellendus quibusdam repellat aperiam dolor autem quaerat voluptatibus, facere porro iusto inventore
            consequatur, sunt consectetur sed quia modi. Consequatur laboriosam fuga officiis dolore reiciendis sequi
            odit at architecto veniam aliquam!
            Sit nesciunt atque exercitationem quia odio reprehenderit nulla dolore, sapiente hic sed cumque, molestias,
            eius porro sequi similique nobis non ratione ullam vel amet voluptate asperiores! Fugiat similique
            repudiandae aliquid.
            Rem provident commodi officiis ea laborum unde porro ad non consectetur, placeat, facere error! Animi in
            quos nesciunt quas ipsam ratione, adipisci, voluptatem nam consectetur explicabo ducimus, facere illo
            quaerat?
            Quasi modi ex itaque labore ipsa, mollitia nemo vitae sint ipsam exercitationem dolorem temporibus tempore
            in deleniti eveniet dolor natus pariatur nobis reiciendis quibusdam magni ut obcaecati. In, obcaecati dolor!
            Ducimus iusto aperiam excepturi officia quos, corrupti nulla, minima enim optio aut amet tenetur aliquam
            expedita provident? Itaque ducimus assumenda obcaecati aperiam rerum corrupti, illo, sint fuga quaerat
            tenetur voluptate.
            Voluptate libero dignissimos quia officia illo ea unde nam et earum quaerat nulla suscipit, quibusdam veniam
            sed soluta maiores animi laborum quidem saepe autem ad quis nesciunt harum! Dolorum, quod?
            Qui rerum magni voluptatum voluptatibus nulla! Non nulla sequi quos itaque repudiandae! Maxime aliquam,
            totam voluptatum id nulla temporibus suscipit beatae est ad commodi officiis tempora quo nihil, esse
            explicabo?
            Voluptas minima impedit consequatur. Omnis nihil accusantium ipsam aperiam totam deserunt quis, et quidem
            minima at cumque nulla quae illo mollitia recusandae porro provident amet expedita eius debitis blanditiis
            ea.
            Eveniet sint molestias tempora dolore quidem nisi veniam sed voluptatem laborum neque. Officiis, quae
            doloribus! Voluptatibus, aliquam distinctio mollitia ut numquam ex unde nostrum debitis, voluptatem non fuga
            modi explicabo!
            Harum itaque optio explicabo labore expedita nulla a, perspiciatis eligendi inventore nesciunt mollitia.
            Asperiores, recusandae eveniet corporis, modi optio officiis corrupti obcaecati necessitatibus, non porro
            debitis! Cumque id rerum ullam.
            Rerum dicta quisquam, quasi fuga nostrum nihil! Dolor quos, debitis officia porro facere dolore sint hic
            quam esse dolores, cupiditate corrupti autem culpa perspiciatis architecto exercitationem numquam
            consequuntur. Exercitationem, quia.
        </div>
    </div>

    <script>
        function toggleDarkMode() {
            document.body.classList.toggle("dark-mode");
        }

        function toggleDropdown(element) {
            element.classList.toggle("active");
        }
    </script>

</body>

</html>