window.onload = () => {
    // الحصول على العنوان الحالي
    var currentURL = window.location.href;
    // الجزء الأخير من العنوان (اسم الملف)
    // var lastPart = currentURL.substring(currentURL.lastIndexOf('/') + 1);
    const navLinks = document.querySelectorAll('.links ul a');

    // استرجاع قيمة الرابط النشطة من localStorage
    const activeLinkAdmin = sessionStorage.getItem("activeLinkAdmin");

    if (activeLinkAdmin) {
        // تعيين العنصر النشط بناءً على القيمة المسترجعة
        navLinks.forEach(link => {
            if (link.href === currentURL) {
                link.classList.add("active");
            } else {
                link.classList.remove("active");
            }
        });
    }

    navLinks.forEach(link => {
        link.addEventListener("click", function () {
            navLinks.forEach(link => {
                link.classList.remove("active");
            });
            this.classList.add("active");

            // حفظ الرابط النشط في localStorage
            sessionStorage.setItem("activeLinkAdmin", location.href);

        });
    });

    const menu = document.querySelector('.sidebar .menu');
    const logo = document.querySelector('.sidebar .logo img');
    const sideBar = document.querySelector('.sidebar');
    const container = document.querySelector('.container');
    const liSpans = document.querySelectorAll('.sidebar .links ul li span');

    menu.addEventListener('click', () => {
        menu.classList.toggle('active')
        sideBar.classList.toggle('active');
        logo.classList.toggle('active');
        liSpans.forEach((span) => {
            span.classList.toggle('active');
        })

        if (menu.classList.contains("active")) {
            container.classList.add("active")
        } else {
            container.classList.remove('active')
        }
    })

    const menu2 = document.querySelector('.sidebar .menu2');
    const links = document.querySelector('.sidebar .links');

    menu2.addEventListener('click', () => {
        links.classList.toggle('active');
        sideBar.classList.toggle('yes');
    })

}