var dropdowns = document.querySelectorAll('.dropdown-morph');

dropdowns.forEach(function (dropdown) {

    dropdown.addEventListener('click', function() {
        var wasActive = this.classList.contains("dropdown-morph-active");

        var icon = this.querySelector('.dropdownarrow');
        var child = this.querySelector('.dropdownHover');

        dropdowns.forEach(function (drop) {
            drop.classList.remove("dropdown-morph-active");
            var dropIcon = drop.querySelector('.dropdownarrow');
            var dropChild = drop.querySelector('.dropdownHover');
            if(dropIcon) {
                dropIcon.classList.remove("rotate");
            }
            if(dropChild) {
                dropChild.classList.remove("display-block");
            }
        });

        if (!wasActive) {
            this.classList.add("dropdown-morph-active");

            if(icon) {
                icon.classList.add("rotate");
            }

            if(child) {
                child.classList.add("display-block");
            }
        }
    });
});