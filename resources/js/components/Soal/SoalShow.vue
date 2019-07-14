<template>
  <div class="main-panel">
    <div class="main-content">
      <div class="content-wrapper">
        <div class="container-fluid">
          <section id="extended">
            <div class="row">
              <div class="col-sm-8 offset-2">
                <div class="card">
                  <div class="card-header">
                    <div class="card-title-wrap bar-info">
                      <h4 class="card-title">Tambah Soal</h4>
                    </div>
                  </div>

                  <div class="card-body">
                    <div class="card-block">
                      <div class="px-3">
                        <div class="form-body">
                          <div class="form-group">
                            <label>Tipe</label>
                            <select class="form-control" v-model="soal.tipe_soal_id" required>
                              <option
                                v-for="tipe in tipes"
                                :key="tipe.id"
                                :value="tipe.id"
                              >{{ tipe.tipe }}</option>
                            </select>
                          </div>

                          <div class="form-group">
                            <label>Kategori</label>
                            <select
                              name="kategori"
                              class="form-control"
                              v-model="soal.kategori_soal_id"
                              required
                            >
                              <option
                                v-for="kategori in kategories"
                                :key="kategori.id"
                                :value="kategori.id"
                              >{{ kategori.kategori }}</option>
                            </select>
                          </div>

                          <div class="form-group" v-if="checkFile">
                            <label>File Audio/Gambar</label>
                            <img
                              onerror="this.src='#'"
                              :src="loadGambar"
                              alt="Gambar Soal"
                              v-if="checkGambar"
                              style="width:100%;"
                            />
                            <input
                              type="file"
                              class="form-control"
                              ref="file"
                              v-on:change="onChangeFileUpload()"
                              required
                            />
                          </div>

                          <div class="form-group">
                            <label>Deskripsi Soal</label>
                            <textarea
                              type="text"
                              class="form-control"
                              name="soal"
                              cols="3"
                              v-model="soal.soal"
                              required
                            ></textarea>
                          </div>

                          <div class="form-group">
                            <label>Jawaban 1</label>
                            <input
                              type="text"
                              class="form-control"
                              name="jawaban_1"
                              v-model="soal.jawaban_1"
                              required
                            />
                          </div>

                          <div class="form-group">
                            <label>Jawaban 2</label>
                            <input
                              type="text"
                              class="form-control"
                              name="jawaban_2"
                              v-model="soal.jawaban_2"
                              value
                              required
                            />
                          </div>

                          <div class="form-group">
                            <label>Jawaban 3</label>
                            <input
                              type="text"
                              class="form-control"
                              name="jawaban_3"
                              v-model="soal.jawaban_3"
                              value
                              required
                            />
                          </div>

                          <div class="form-group">
                            <label>Jawaban 4</label>
                            <input
                              type="text"
                              class="form-control"
                              name="jawaban_4"
                              v-model="soal.jawaban_4"
                              value
                            />
                          </div>

                          <div class="form-group">
                            <label>Jawaban Benar</label>
                            <select
                              name="kategori"
                              class="form-control"
                              @change="getJawabanBenar()"
                              v-model="pilihan_jawaban"
                              required
                            >
                              <option value="1">Jawaban 1</option>
                              <option value="2">Jawaban 2</option>
                              <option value="3">Jawaban 3</option>
                              <option value="4">Jawaban 4</option>
                            </select>
                          </div>
                        </div>

                        <div class="form-actions float-right">
                          <a href="javascript:void(0)" @click="reset()" class="btn btn-danger mr-1">
                            <i class="icon-trash"></i> Cancel
                          </a>
                          <button type="button" @click="handleSubmit()" class="btn btn-success">
                            <i class="icon-note"></i> Save
                          </button>
                        </div>
                      </div>
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
import {
  baseUrl,
  tipeSoal,
  kategoriSoal,
  soal,
  simpanSoal
} from "../../settings/config";
import axios from "axios";
import swal from "sweetalert2";

export default {
  name: "SoalShow",
  created() {
    this.getSoal();
    this.getTipe();
    this.getKategori();
  },
  data() {
    return {
      tipes: [],
      kategories: [],
      soal: [],
      pilihan_jawaban: "",
      errors: [],
      gambar: ""
    };
  },
  computed: {
    checkFile() {
      if (this.soal.tipe_soal_id == 2 || this.soal.tipe_soal_id == 3) {
        return true;
      }
      return false;
    },
    checkGambar() {
      if (this.soal.tipe_soal_id == 3) {
        return true;
      }
      return false;
    },
    loadGambar() {
      const image_url = baseUrl + "soal/" + this.soal.file;
      return image_url;
    }
  },
  methods: {
    async getSoal() {
      let url = window.location.href;
      let segments = url.split("/");
      let id = segments.pop();

      await axios
        .get(soal + "/" + id)
        .then(response => {
          this.soal = response.data.data;
        })
        .catch(error => {
          console.log(error);
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
    async handleSubmit() {
      this.errors = [];
      if (!this.soal.tipe_soal_id) this.errors.push("Tipe soal belum dipilih");
      if (!this.soal.kategori_soal_id)
        this.errors.push("Kategori soal belum dipilih");
      if (!this.soal.soal) this.errors.push("Soal belum diisi");
      if (!this.soal.jawaban_1) this.errors.push("Jawaban 1 belum diisi");
      if (!this.soal.jawaban_2) this.errors.push("Jawaban 2 belum diisi");
      if (!this.soal.jawaban_3) this.errors.push("Jawaban 3 belum diisi");
      if (!this.soal.jawaban_4) this.errors.push("Jawaban 4 belum diisi");
      if (!this.soal.jawaban_benar)
        this.errors.push("Jawaban benar belum diisi");
      if (this.soal.tipe_soal_id == 2 && !this.soal.file)
        this.errors.push("Audio belum disertakan");
      if (this.soal.tipe_soal_id == 3 && !this.soal.file)
        this.errors.push("Gambar belum disertakan");

      let length_errors = this.errors.length;
      if (length_errors > 0) {
        let str_error = "";
        this.errors.forEach(function(item, index) {
          if (index != length_errors - 1) str_error += item + ", ";
          else str_error += item;
        });
        swal.fire("Form error!", str_error, "error");
      } else {
        const postData = new FormData();
        postData.append("id", this.soal.id);
        postData.append("tipe_id", this.soal.tipe_soal_id);
        postData.append("kategori_id", this.soal.kategori_soal_id);
        postData.append("soal", this.soal.soal);
        postData.append("jawaban_1", this.soal.jawaban_1);
        postData.append("jawaban_2", this.soal.jawaban_2);
        postData.append("jawaban_3", this.soal.jawaban_3);
        postData.append("jawaban_4", this.soal.jawaban_4);
        postData.append("jawaban_benar", this.soal.jawaban_benar);
        postData.append("file", this.soal.file);
        try {
          let response = await axios.post(simpanSoal, postData);
          swal.fire("Sukses!", "Simpan data berhasil", "success");
          window.location = "/admin/soal/soal";
        } catch (e) {
          swal.fire("Gagal!", e.response.data.message, "error");
        }
      }
    },
    reset() {
      this.soal.id = "";
      this.soal.kategori_soal_id = "";
      this.soal.soal = "";
      this.soal.jawaban_1 = "";
      this.soal.jawaban_2 = "";
      this.soal.jawaban_3 = "";
      this.soal.jawaban_4 = "";
      this.soal.jawaban_benar = "";
      this.pilihan_jawaban = "";
      this.$refs.file.type = "text";
      this.$refs.file.type = "file";
    },
    getJawabanBenar() {
      if (this.pilihan_jawaban == 1)
        this.soal.jawaban_benar = this.soal.jawaban_1;
      else if (this.pilihan_jawaban == 2)
        this.soal.jawaban_benar = this.soal.jawaban_2;
      else if (this.pilihan_jawaban == 3)
        this.soal.jawaban_benar = this.soal.jawaban_3;
      else if (this.pilihan_jawaban == 4)
        this.soal.jawaban_benar = this.soal.jawaban_4;
    },
    onChangeFileUpload() {
      this.soal.file = this.$refs.file.files[0];
    }
  }
};
</script>

<style lang="scss" scoped>
</style>
