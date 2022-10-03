$(function() {
    function getInitials(valStr) {
        var words = valStr.split(" "),
        initials = "";
        words.forEach(function(word) {
        initials += word.charAt(0);
        });
        return initials.toUpperCase();
    }
    $("input[name=customer_name]").focusout(function() {
        var val = $(this).val();
        const customerName = getInitials(val);
        const month = new Date().getMonth() + 1;
        const year = new Date().getFullYear().toString().substr(-2);
        customerUID = "MH-C/" + month + year + "/" + customerName;
        document.getElementById('customer_unq_id').innerHTML = customerUID;
        localStorage.setItem("storageName",customerUID);

        console.log(customerUID);
    })
})
