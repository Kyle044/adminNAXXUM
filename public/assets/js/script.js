$(document).ready(() => {
    var state = "";
    $("#createadmin").css("display", "none");
    $("#addadmin").on("click", () => {
        $("#adminlist").css("display", "none");
        $("#createadmin").css("display", "block");
        $("#title").text("CREATE ADMIN");
        $("#formbtn").text("Create");
        $("#createForm")
            .find(
                "input[type=text], textarea",
                "input[type=password]",
                "input[type=password]"
            )
            .val("");
        state = "create";
        console.log(state);
    });
    $("#dashbtn").on("click", () => {
        $("#adminlist").css("display", "block");
        $("#createadmin").css("display", "none");
    });
    $("#logoutbtn").on("click", () => {
        if (confirm("Are you sure you want logout?")) {
            $.ajaxSetup({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                        "content"
                    ),
                },
            });
            $.ajax({
                url: "/logout",
                type: "get",

                success: (res) => {
                    if (res.boolean) {
                        alert(res.msg);
                        window.location.href = "./";
                    } else {
                        alert(res.msg);
                    }
                },
                cache: false,
                contentType: false,
                processData: false,
            });
        } else {
        }
    });
    $("#admin").DataTable();

    $("#loginForm").on("submit", (e) => {
        e.preventDefault();
        var formData = new FormData(e.target);
        if (formData.get("username") && formData.get("password")) {
            $.ajaxSetup({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                        "content"
                    ),
                },
            });
            $.ajax({
                url: "/AuthenticateWeb",
                type: "POST",
                data: formData,
                success: (res) => {
                    console.log(res);
                    if (res.boolean) {
                        alert(res.msg);
                        window.location.href = "/admin";
                    } else {
                        alert(res.data);
                        window.location.href = "/";
                    }
                },
                cache: false,
                contentType: false,
                processData: false,
            });
        } else {
            alert("Kindly Fill up all the fields");
        }
    });

    $("#createForm").on("submit", (e) => {
        e.preventDefault();
        var formData = new FormData(e.target);

        if (formData.get("confirm") && formData.get("password")) {
            if (formData.get("confirm") == formData.get("password")) {
                if (state == "create") {
                    $.ajaxSetup({
                        headers: {
                            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                                "content"
                            ),
                        },
                    });
                    $.ajax({
                        url: "/createAdmin",
                        type: "POST",
                        data: formData,
                        success: (res) => {
                            console.log(res);
                            if (res.boolean) {
                                alert(res.msg);
                                $("#createForm")
                                    .find(
                                        "input[type=text], textarea",
                                        "input[type=password]",
                                        "input[type=password]"
                                    )
                                    .val("");
                            } else {
                                alert(res.msg);
                            }
                        },
                        cache: false,
                        contentType: false,
                        processData: false,
                    });
                } else if (state == "update") {
                    var formData = new FormData(e.target);

                    $.ajaxSetup({
                        headers: {
                            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                                "content"
                            ),
                        },
                    });
                    $.ajax({
                        url: "/updateAdminWeb",
                        type: "POST",
                        data: formData,
                        success: (res) => {
                            console.log(res);
                            if (res.boolean) {
                                alert(res.msg);
                            } else {
                                alert(res.msg);
                            }
                        },
                        cache: false,
                        contentType: false,
                        processData: false,
                    });
                }
            } else {
                alert("Password does not match");
            }
        } else {
            alert("Kindly Fill up all the password");
        }
    });
    $(document).on("click", ".del", (e) => {
        if (confirm("Are you sure you want delete the admin?")) {
            var formData = new FormData();
            formData.append("id", e.target.name);
            $.ajaxSetup({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                        "content"
                    ),
                },
            });
            $.ajax({
                url: "/deleteAdminWeb",
                type: "POST",
                data: formData,
                success: (res) => {
                    console.log(res);
                    if (res.boolean) {
                        alert(res.msg);
                    } else {
                        alert(res.msg);
                    }
                },
                cache: false,
                contentType: false,
                processData: false,
            });
        } else {
        }
    });

    $(document).on("click", ".up", (e) => {
        $("#adminlist").css("display", "none");
        $("#createadmin").css("display", "block");
        $("#title").text("UPDATE ADMIN");
        $("#formbtn").text("Update");
        state = "update";
        console.log(state);
        var tblRow = e.target.parentNode.parentNode;
        var id = e.target.name;
        var username = tblRow.querySelectorAll("td")[0].innerText;
        var fullname = tblRow.querySelectorAll("td")[2].innerText;
        var contact = tblRow.querySelectorAll("td")[3].innerText;
        var email = tblRow.querySelectorAll("td")[4].innerText;

        $("#createForm").find("input[name=username]").val(username);
        $("#createForm").find("input[name=full_name]").val(fullname);
        $("#createForm").find("input[name=contact_number]").val(contact);
        $("#createForm").find("input[name=email]").val(email);
        $("#createForm").find("input[name=id]").val(id);
    });
});
