document.addEventListener("DOMContentLoaded", function() {
    document.getElementById("searchInput").addEventListener("keyup", function() {
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("searchInput");
        filter = removeAccents(input.value.toLowerCase());
        table = document.getElementById("productsTable");
        tr = table.getElementsByTagName("tr");

        for (i = 1; i < tr.length; i++) {
            td = tr[i].getElementsByClassName("product-title")[0];
            if (td) {
                txtValue = removeAccents(td.textContent || td.innerText);
                tr[i].style.display = txtValue.toLowerCase().indexOf(filter) > -1 ? "" : "none";
            }
        }
    });

    function removeAccents(str) {
        return str.normalize("NFD").replace(/[\u0300-\u036f]/g, "");
    }
});
