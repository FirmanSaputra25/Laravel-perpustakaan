var controller = Vue.createApp({
    data() {
        return {
            datas: [],
            data: {},
            actionUrl,
            apiUrl,
        };
    },
    mounted: function () {
        this.datatable();
    },
    methods: {
        datatable() {
            const _this = this;
            _this.table = $("#datatable")
                .DataTable({
                    ajax: {
                        url: _this.apiUrl,
                        type: "GET",
                    },
                    columns,
                })
                .on("xhr", function () {
                    _this.datas = _this.table.ajax.json().data;
                });
        },
        addData() {
            this.data = {};

            $("#modal-default").modal();
        },
        editData(event, row) {
            this.data = this.datas[row];
            this.data = data;

            $("#modal-default").modal();
        },
        deleteData(event, id) {
            // this.actionUrl = '{{url('authors')}}'
            if (confirm("apakah ingin hapus data ?")) {
                axios
                    .post(this.actionUrl, { _method: "DELETE" })
                    .then((response) => {
                        location.reload();
                    });
            }
        },
        submitForm(event, id) {
            event.preventDefault();
            const _this = this;
            var actionUrl = !this.editStatus
                ? this.actionUrl
                : this.actionUrl + "/" + id;
            axios
                .post(actionUrl, new FormData($(event.target)[0]))
                .then((response) => {
                    $("#modal-default").modal("hide");
                    _this.table.ajax.reload();
                });
        },
    },
});
controller.mount("#controller");
