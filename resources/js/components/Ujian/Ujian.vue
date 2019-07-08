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
                      <h4 class="card-title">Data Ujian</h4>
                    </div>
                  </div>

                  <div class="row ml-2 mr-2">
                    <div class="col-md-6 offset-md-6">
                      <div class="form-group row">
                        <label class="col-md-4 label-control" for="userinput8">Kategori Ujian</label>
                        <div class="col-md-8">
                          <select class="form-control" v-model="kategori" @change="refreshData">
                            <option value>All</option>
                            <option
                              v-for="kategori in kategories"
                              :value="kategori.id"
                              :key="kategori.id"
                            >{{kategori.nama}}</option>
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
                      />
                    </div>
                  </div>

                  <div class="card-body">
                    <div class="card-block">
                      <a href="/admin/ujian/ujian/create">
                        <button
                          class="btn btn-sm btn-success mr-1 shadow-z-2"
                          style="font-weight: bold"
                        >Tambah Ujian</button>
                      </a>

                      <table class="table table-responsive-md text-left">
                        <thead>
                          <tr>
                            <th>#</th>
                            <th style="text-align: left">Kategori</th>
                            <th style="text-align: left">Nama Ujian</th>
                            <th style="text-align: left">Slug</th>
                            <th>actions</th>
                          </tr>
                        </thead>
                        <tbody>
                          <template v-if="ujians.length > 0">
                            <tr v-for="(ujian, key) in ujians">
                              <td>{{key + 1}}</td>
                              <td>{{ujian.kategori_ujian}}</td>
                              <td>{{ ujian.nama }}</td>
                              <td>{{ ujian.slug }}</td>
                              <td class="text-center">
                                <a
                                  :href="'/admin/ujian/ujian/'+ujian.id"
                                  class="info p-0"
                                  data-original-title
                                  title
                                >
                                  <i class="fa fa-eye font-medium-3 mr-2"></i>
                                </a>
                                <a
                                  :href="'/admin/ujian/ujian/'+ujian.id+'/edit'"
                                  class="success p-0"
                                  data-original-title
                                  title
                                >
                                  <i class="fa fa-pencil font-medium-3 mr-2"></i>
                                </a>
                                <a
                                  @click="handleDelete(ujian.id, key)"
                                  class="danger p-0"
                                  data-original-title
                                  title
                                >
                                  <i class="fa fa-trash-o font-medium-3 mr-2"></i>
                                </a>
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
                      />
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
import { ujian, kategoriUjian } from "../../settings/config";

export default {
  name: "Ujian",
  created() {
    this.getData();
    this.getKategori();
  },
  data() {
    return {
      ujians: [],
      search: "",
      kategories: [],
      kategori: "",
      page: "",
      pagging: []
    };
  },
  methods: {
    async getData() {
      this.page = this.pagging.current_page;
      await axios
        .get(
          ujian +
            "?kategori=" +
            this.kategori +
            "&search=" +
            this.search +
            "&page=" +
            this.page
        )
        .then(response => {
          this.ujians = response.data.data;
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
          ujian +
            "?kategori=" +
            this.kategori +
            "&search=" +
            this.search +
            "&page=" +
            this.page
        )
        .then(response => {
          this.ujians = response.data.data;
          this.pagging = response.data.meta;
        })
        .catch(error => {
          console.log(error);
          this.errored = true;
        });
    },
    async getKategori() {
      await axios
        .get(kategoriUjian)
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
        await axios.delete(ujian + "/" + id);
        swal.fire("Deleted!", "Your data has been deleted.", "success");
        this.ujians.splice(index, 1);
      }
    },
    ujianLimit(ujian) {
      if (ujian.length > 50) {
        let ujian_new = ujian.substring(0, 60) + "...";
        return ujian_new;
      }
      return ujian;
    },
    refreshData() {
      this.getData();
    }
  }
};
</script>

<style lang="scss" scoped>
</style>
