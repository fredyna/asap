<template>
  <div class="main-panel">
    <div class="main-content">
      <div class="content-wrapper">
        <div class="container-fluid">
          <!--Statistics cards Starts-->
          <section id="extended">
            <div class="row">
              <div class="col-sm-12">
                <div class="card">
                  <div class="card-header">
                    <div class="card-title-wrap bar-info">
                      <h4 class="card-title">Data Soal Ujian</h4>
                    </div>
                  </div>

                  <div class="row ml-2 mr-2">
                    <div class="col-md-6">
                      <div class="form-group row">
                        <label class="col-md-4 label-control">Tipe Soal</label>
                        <div class="col-md-8">
                          <select class="form-control" v-model="tipe" @change="refreshData">
                            <option value>All</option>
                            <option
                              v-for="tipe in tipes"
                              :value="tipe.id"
                              :key="tipe.id"
                            >{{tipe.tipe}}</option>
                          </select>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group row">
                        <label class="col-md-4 label-control" for="userinput8">Kategori Soal</label>
                        <div class="col-md-8">
                          <select class="form-control" v-model="kategori" @change="refreshData">
                            <option value>All</option>
                            <option
                              v-for="kategori in kategories"
                              :value="kategori.id"
                              :key="kategori.id"
                            >{{kategori.kategori}}</option>
                          </select>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="col-12">
                    <div class="input-group mb-2 mr-sm-2">
                      <div class="input-group-prepend">
                        <div class="input-group-text">
                          <i class="fa fa-search"></i>
                        </div>
                      </div>
                      <input
                        type="text"
                        class="form-control"
                        placeholder="Search..."
                        v-model="search"
                        @keyup="refreshData"
                      >
                    </div>
                  </div>

                  <div class="card-body">
                    <div class="card-block">
                      <a :href="generateLink">
                        <button
                          class="btn btn-sm btn-info mr-1 shadow-z-2"
                          style="font-weight: bold"
                        >
                          <i class="fa fa-arrow-left"></i> Back
                        </button>
                      </a>
                      <a @click="handleAddSoal" href="javascript:void(0)" v-if="soal_id.length > 0">
                        <button
                          class="btn btn-sm btn-success mr-1 shadow-z-2"
                          style="font-weight: bold"
                        >Tambah</button>
                      </a>

                      <table class="table table-responsive-md text-center">
                        <thead>
                          <tr>
                            <th>#</th>
                            <th style="text-align: left">Tipe Soal</th>
                            <th style="text-align: left">Kategori Soal</th>
                            <th style="text-align: left">Soal</th>
                            <th>actions</th>
                          </tr>
                        </thead>
                        <tbody>
                          <template v-if="soals.length > 0">
                            <tr v-for="(soal, key) in soals">
                              <td>{{key + 1}}</td>
                              <td>{{soal.tipe_soal}}</td>
                              <td>{{soal.kategori_soal}}</td>
                              <td class="text-left">{{ soalLimit(soal.soal)}}</td>
                              <td>
                                <input type="checkbox" :value="soal.id" v-model="soal_id">
                              </td>
                            </tr>
                          </template>
                          <template v-else>
                            <tr>
                              <td colspan="5">
                                <i>Tidak ada data</i>
                              </td>
                            </tr>
                          </template>
                        </tbody>
                      </table>
                      <button
                        v-show="pagging.current_page >1"
                        type="button"
                        class="btn btn-sm btn-primary mr-1"
                        @click="getDataPagging('prev')"
                      >Previous</button>
                      <button
                        v-show="pagging.current_page !== pagging.last_page && pagging.last_page !== 0"
                        type="button"
                        class="btn btn-sm btn-primary mr-1"
                        @click="getDataPagging('next')"
                      >Next</button>
                      <input
                        type="text"
                        class="btn btn-sm btn-primary mr-1"
                        v-model="pagging.current_page"
                        size="3"
                        @keyup.enter="getData()"
                      >
                      <label class="btn btn-sm btn-info mr-1">Last: {{pagging.last_page}}</label>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </section>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { soal, tipeSoal, kategoriSoal, soalUjian } from "../../settings/config";
export default {
  name: "Soal",
  created() {
    this.getData();
    this.getTipe();
    this.getKategori();
  },
  data() {
    return {
      soals: [],
      search: "",
      kategories: [],
      tipes: [],
      tipe: "",
      kategori: "",
      page: "",
      pagging: [],
      soal_id: []
    };
  },
  computed: {
    getId() {
      let url = window.location.href;
      let segments = url.split("/");
      let id = segments.pop();
      return id;
    },
    generateLink() {
      const link = "/admin/ujian/ujian/" + this.getId;
      return link;
    }
  },
  methods: {
    async getData() {
      this.page = this.pagging.current_page;

      await axios
        .get(
          soal +
            "?tipe=" +
            this.tipe +
            "&kategori=" +
            this.kategori +
            "&search=" +
            this.search +
            "&page=" +
            this.page
        )
        .then(response => {
          this.soals = response.data.data;
          this.pagging = response.data.meta;
        })
        .catch(error => {
          console.log(error);
          this.errored = true;
        });
    },
    async getDataPagging(pagging) {
      if (pagging == "prev") {
        this.page = this.pagging.current_page - 1;
      } else {
        this.page = this.pagging.current_page + 1;
      }

      await axios
        .get(
          soal +
            "?tipe=" +
            this.tipe +
            "&kategori=" +
            this.kategori +
            "&search=" +
            this.search +
            "&page=" +
            this.page
        )
        .then(response => {
          this.soals = response.data.data;
          this.pagging = response.data.meta;
        })
        .catch(error => {
          console.log(error);
          this.errored = true;
        });
    },
    async getTipe() {
      await axios
        .get(tipeSoal)
        .then(response => {
          this.tipes = response.data.data;
        })
        .catch(error => {
          console.log(error);
        });
    },
    async getKategori() {
      await axios
        .get(kategoriSoal)
        .then(response => {
          this.kategories = response.data.data;
        })
        .catch(error => {
          console.log(error);
        });
    },
    async handleDelete(id, index) {
      let result = await swal.fire({
        title: "Are you sure?",
        text: "You won't be able to revert this!",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, delete it!"
      });
      if (result.value) {
        await axios.delete(hapusSoal + "/" + id);
        swal.fire("Deleted!", "Your data has been deleted.", "success");
        this.soals.splice(index, 1);
      }
    },
    async handleAddSoal(id) {
      const postData = {
        ujian_id: this.getId,
        soal_id: this.soal_id
      };

      try {
        let response = await axios.post(soalUjian, postData);
        swal.fire("Sukses!", "Simpan data berhasil", "success");
        this.soal_id = [];
      } catch (e) {
        swal.fire("Gagal!", e.response.data.message, "error");
      }
    },
    soalLimit(soal) {
      if (soal.length > 50) {
        let soal_new = soal.substring(0, 60) + "...";
        return soal_new;
      }
      return soal;
    },
    refreshData() {
      this.getData();
    }
  }
};
</script>

<style lang="scss" scoped>
</style>
