var controller = Vue.createApp({
    data() {
        return {
            datas: [],
            data: {},
            actionUrl, // Perhatikan bahwa Anda perlu menetapkan nilai ini
            apiUrl, // Perhatikan bahwa Anda perlu menetapkan nilai ini
            table: null, // Tambahkan properti tabel untuk menyimpan objek DataTable
        };
    },
    mounted: function () {
        this.datatable();
    },
    methods: {
        datatable() {
            const _this = this;
            this.table = $("#datatable")
                .DataTable({
                    ajax: {
                        url: this.apiUrl,
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
        editData(row) {
            this.data = this.datas[row];
            $("#modal-default").modal();
        },
        deleteData(id) {
            if (confirm("Apakah Anda yakin ingin menghapus data ini?")) {
                const deleteUrl = this.apiUrl + "/" + id; // Tentukan URL penghapusan yang benar
                axios
                    .delete(deleteUrl)
                    .then(() => {
                        this.table.ajax.reload();
                    })
                    .catch((error) => {
                        console.error("Error deleting data:", error);
                    });
            }
        },
        submitForm(event, id) {
            event.preventDefault();
            const formData = new FormData(event.target);
            const submitUrl = id ? this.apiUrl + "/" + id : this.actionUrl;
            axios
                .post(submitUrl, formData)
                .then(() => {
                    $("#modal-default").modal("hide");
                    this.table.ajax.reload();
                })
                .catch((error) => {
                    console.error("Error submitting form:", error);
                });
        },
    },
});

controller.mount("#controller");
