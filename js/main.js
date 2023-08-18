$(function () {
    function translit_name(strToTranslit) {
        const translit_object = { 'а': 'a', 'б': 'b', 'в': 'v', 'г': 'g', 'д': 'd', 'е': 'e', 'ё': 'yo', 'ж': 'zh', 'з': 'z', 'и': 'i', 'й': 'y', 'к': 'k', 'л': 'l', 'м': 'm', 'н': 'n', 'о': 'o', 'п': 'p', 'р': 'r', 'с': 's', 'т': 't', 'у': 'u', 'ф': 'f', 'х': 'h', 'ц': 'ts', 'ч': 'ch', 'ш': 'sh', 'щ': 'sch', 'ы': 'y', 'э': 'e', 'ю': 'yu', 'я': 'ya' },
            translit_array = [];
        strToTranslit = strToTranslit.replace(/[ъь]+/g, "");
        for (var i = 0; i < strToTranslit.length; ++i) {
            translit_array.push(translit_object[strToTranslit[i]] || strToTranslit[i]);
        }
        console.log(translit_array.join(""));
        return translit_array.join("").replace(/ /g, "-").replace(/["'()\[\]]/g, "-").toLowerCase();
    }
    $("form#create_page input[name='NAME']").on("change", function () {
        $(this).next().val(translit_name($(this).val()));
    });
    $("form#create_page").on("submit", function (e) {
        e.preventDefault();
        $.ajax({
            type: "post",
            url: "/ajax/add_page_ajax.php",
            data: $(this).serialize(),
            dataType: "dataType",
            success: function (response) {
                console.log("A");
            }
        });
    })
});