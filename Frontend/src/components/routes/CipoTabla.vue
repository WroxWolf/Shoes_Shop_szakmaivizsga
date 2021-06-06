<template>
  <div class="szoveg-tipus">
    <div class="my-Title">
      <h1>{{ title }} </h1>
      <button
        class="btn bg-dark btn-outline-light btn-sm my-ctrl-btn"
        @click="onClickedInsert()"
        >
          <i class="bi bi-plus"></i>
      </button>
      <button
        class="btn bg-dark btn-outline-light btn-sm my-ctrl-btn"
        @click="onClickedRefresh()"
        >
        <i class="bi bi-arrow-counterclockwise"></i>
        </button>
    </div>
    <div class="table-responsive szoveg-tipus">
      <table class="table table-striped my-table-fit">
        <thead class="tabl-dark">

          <!-- Fejléc -->
          <th v-for="(column, columnKey, indexH) in columns" :key="indexH"
          :class="{
           'd-none': indexH == 0
            }"
          >
            {{ column }}
          </th>
        </thead>

        <tbody>
          <!-- Adatsorok -->
          <tr v-for="(row, indexR) in rows" :key="indexR">

            <!-- adatcellák (oszlopok) -->
            <td @click="onClickedUpdate(row)" v-for="(cell, key, indexD) in row" :key="indexD"
            :class="{
              'd-none': indexD == 0
            }"
            >{{ cell }}</td>
          </tr>
        </tbody>
      </table>
    </div>

    <!-- Modal -->
    <div
      class="modal fade"
      id="myModal"
      data-bs-backdrop="static"
      data-bs-keyboard="false"
      tabindex="-1"
      aria-labelledby="staticBackdropLabel"
      aria-hidden="true"
    >
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="staticBackdropLabel">
              {{ modalTitle }}
            </h5>
            <button
              type="button"
              class="btn-close"
              @click="formCancel()"
              aria-label="Close"
            ></button>
          </div>
          <div class="modal-body">
            <!-- űrlap -->
            <div class="modal-body">
              <form class="row g-3 needs-validation" novalidate>
                <!-- Név -->
                <div class="col-md-6">
                  <label for="Nev" class="form-label">Név</label>
                  <input
                    type="text"
                    class="form-control"
                    id="Nev"
                    v-model="row.Nev"
                    required
                  />
                  <div class="invalid-feedback">Kötelező!</div>
                </div>
                <!-- Tipus -->
                <div class="col-md-6">
                  <label for="Tipus" class="form-label">Tipus</label>
                  <select class="form-select" v-model="row.TipusId">
                    <option v-for="TipusErtek in TipusRow"
                    :key="TipusErtek.TipusId"
                    :value="TipusErtek.TipusId"
                    :selected="TipusErtek.TipusId == row.TipusId ? 'selected' : ''"
                     >
                     {{TipusErtek.Tipus}}
                    </option>
                  </select>
                  <div class="invalid-feedback">Kötelező!</div>
                </div>
                <!-- Szín -->
                <div class="col-md-6">
                  <label for="Szin" class="form-label">Szin</label>
                  <select class="form-select" v-model="row.SzinId">
                    <option v-for="SzinErtek in SzinRow"
                    :key="SzinErtek.SzinId"
                    :value="SzinErtek.SzinId"
                    :selected="SzinErtek.TipusId == row.SzinId ? 'selected' : ''"
                     >
                     {{SzinErtek.Szin}}
                    </option>
                  </select>
                  <div class="invalid-feedback">Kötelező!</div>
                </div>
                <!-- Márka -->
                <div class="col-md-6">
                  <label for="Marka" class="form-label">Márka</label>
                  <select class="form-select" v-model="row.MarkaId">
                    <option v-for="MarkaErtek in MarkaRow"
                    :key="MarkaErtek.MarkaId"
                    :value="MarkaErtek.MarkaId"
                    :selected="MarkaErtek.MarkaId == row.MarkaId ? 'selected' : ''"
                     >
                     {{MarkaErtek.Marka}}
                    </option>
                  </select>
                  <div class="invalid-feedback">Kötelező!</div>
                </div>
                <!-- Leírás -->
                <div class="col-md-12">
                  <label for="Leiras" class="form-label">Leírás</label>
                  <input
                    type="text"
                    class="form-control"
                    id="Leiras"
                    v-model="row.Leiras"
                    required
                  />
                  <div class="invalid-feedback">Kötelező!</div>
                </div>
                <!-- Nettó ár -->
                <div class="col-md-6">
                  <label for="Netto" class="form-label">Nettó ár</label>
                  <input
                    type="number"
                    class="form-control"
                    id="Netto"
                    v-model="row.Netto"
                    required
                  />
                  <div class="invalid-feedback">Kötelező!</div>
                </div>
                <!-- Afakulcs -->
                <div class="col-md-6">
                  <label for="AfaKulcs" class="form-label">Áfa</label>
                  <input
                    type="double"
                    class="form-control"
                    id="Afakulcs"
                    v-model="row.AfaKulcs"
                    required
                  />
                  <div class="invalid-feedback">Kötelező!</div>
                </div>
                <!-- Kép -->
                <div class="col-md-12">
                  <label for="Kep" class="form-label">Kép</label>
                  <input
                    type="text"
                    class="form-control"
                    id="Kep"
                    v-model="row.Kep"
                    required
                  />
                  <div class="invalid-feedback">Kötelező!</div>
                </div>
              </form>
            </div>
          </div>
          <div class="modal-footer">
             <button
                class="btn"
                @click="onClickedDelete(row)"
              >
                <i class="my-modalButton bi bi-trash-fill"></i>
              </button>
            <button type="button" class="btn" @click="formSave()">
              <i class="my-modalButton bi bi-save2-fill"></i>
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
const axios = require("axios").default;
const bootstrap = require("bootstrap");

class Cipo {
  constructor(Id, Nev, TipusId, Tipus, SzinId,Szin,MarkaId,Marka,Leiras,Netto,AfaKulcs,Kep) {
        this.Id = Id;
        this.Nev = Nev;
        this.TipusId = TipusId;
        this.Tipus = Tipus;
        this.SzinId = SzinId;
        this.Szin = Szin;
        this.MarkaId = MarkaId;
        this.Marka = Marka;
        this.Leiras = Leiras;
        this.Netto = Netto;
        this.AfaKulcs = AfaKulcs;
        this.Kep = Kep;
  }
}

export default {
  name: "Cipok",
  data() {
    return {
      queryGet: "CipoTabla",
      TipusGet: "TipusTabla",
      SzinGet: "SzinekTabla",
      MarkaGet: "MarkaTabla",
      title: null,
      columns: [],
      rows: [],
      //Rowok
      TipusRow: [],
      SzinRow: [],
      MarkaRow: [],

      resData: null,
      row: new Cipo(0, null,0,null,0,null,0,null,null,0,0,null),
      //Ürlap
      modalTitle: null,
      status: null,

      myModal: null,
      modalX: null,
      form: null,
    };
  },
  created() {
    this.getRows();
    this.getTipusok();
    this.getSzin();
    this.getMarka();
  },
  // oldal betötlődés után
  mounted() {
    //modal
    this.myModal = document.getElementById("myModal");
    this.modalX = new bootstrap.Modal(this.myModal);

    //űrlap validációhoz
    this.form = document.querySelector(".needs-validation");
  },
  methods: {
    getRows() {
      //ajax kérés (get)
      axios
        .get(this.url, {
          params: {
            query: this.queryGet,
          },
        })
        .then((res) => {
          this.resData = res.data;
          this.title = this.resData.title;
          this.columns = this.resData.columns;
          this.rows = this.resData.rows;
          console.log("Title:", this.title);
        })
        .catch((error) => {
          console.log(error);
        });
    },
    getTipusok(){
      axios
        .get(this.url, {
          params: {
            query: this.TipusGet,
          },
        })
        .then((res) => {
          this.resData = res.data;
          this.TipusRow = this.resData.rows;
        })
        .catch((error) => {
          console.log(error);
        });
    },
    getSzin(){
      axios
        .get(this.url, {
          params: {
            query: this.SzinGet,
          },
        })
        .then((res) => {
          this.resData = res.data;
          this.SzinRow = this.resData.rows;
        })
        .catch((error) => {
          console.log(error);
        });
    },
    getMarka(){
      axios
        .get(this.url, {
          params: {
            query: this.MarkaGet,
          },
        })
        .then((res) => {
          this.resData = res.data;
          this.MarkaRow = this.resData.rows;
        })
        .catch((error) => {
          console.log(error);
        });
    },
    deleteRow(id) {
      console.log(id);
      //post
      let params = {
        query: "CipoDeleteById",
        Id: id,
      };
      axios
        .post(this.url, params)
        .then(() => {
          this.getRows();
        })
        .catch((error) => {
          console.log(error);
        });
    },
    updateRow() {
      //post
      let params = {
        query: "CipoUpdateById",
        Nev: this.row.Nev,
        TipusId: this.row.TipusId,
        SzinId: this.row.SzinId,
        MarkaId: this.row.MarkaId,
        Leiras: this.row.Leiras,
        Netto: this.row.Netto,
        AfaKulcs: this.row.AfaKulcs,
        Kep: this.row.Kep,
        Id: this.row.Id,
      };
      axios
        .post(this.url, params)
        .then((res) => {
          console.log(res);
          this.getRows();
        })
        .catch((error) => {
          console.log(error);
        });
    },
    insertRow() {
      //post
      let params = {
        query: "CipoInsert",
        Nev: this.row.Nev,
        TipusId: this.row.TipusId,
        SzinId: this.row.SzinId,
        MarkaId: this.row.MarkaId,
        Leiras: this.row.Leiras,
        Netto: this.row.Netto,
        AfaKulcs: this.row.AfaKulcs,
        Kep: this.row.Kep,
      };
      axios
        .post(this.url, params)
        .then(() => {
          this.getRows();
        })
        .catch((error) => {
          console.log(error);
        });
    },

    onClickedDelete(row) {
      this.status = "delete";
      let id = row.Id;
      if (confirm("Töröljem?")) {
        this.deleteRow(id);
      }
      this.modalX.hide();
    },
    onClickedUpdate(row) {
      this.modalTitle = "Adat módosítás";
      this.status = "update"
      this.row = { ...row };

      //űrlap indit
      this.formShow();
      // this.row =row;
    },
    onClickedInsert() {
      this.modalTitle = "új cipő bevitele";
      this.status = "insert"
      this.row = new Cipo(0, null,0,null,0,null,0,null,null,0,0,null);

      this.formShow();
      //Hozzáadja az új sort
      //this.insertRow();
    },
    onClickedRefresh() {
      this.status = "refresh";
      this.getRows();
    },
    // Űrlap kezelés
    formCancel() {
      this.modalX.hide();
    },
    formShow() {
      this.modalX.show();
    },
    formSave() {
      this.form.classList.add("was-validated");
      if (this.form.checkValidity()) {
        //űrlap adatkezelés
        if (this.status == "insert") {
          this.insertRow();
        } else if (this.status == "update") {
          this.updateRow();
        }

        //Űrlap bezár
        this.modalX.hide();
      } else {
        return;
      }
    },
  },
};
</script>

<style>
.my-ctrl-btn {
  padding: 0 1px !important;
  margin: 0 2px;
  width: 25px;
  height: 25px;
}
.my-hide{
  display: none;
}
.my-modalButton{
  font-size: 30px;
}
.my-Title{
  text-align: center;
  border-bottom:2px solid black;
  padding: 10px;
}
@media(max-width:1024px){
  .table thead{
    display: none;
  }
  .table, .table tbody, .table tr, .table td{
    display: block;
    width: 100%;
  }
  .table tr{
    margin-bottom: 15px;
  }
  .table td{
    text-align: left;
    text-align: left;
    position: relative;
  }
}
tr:hover{
  background-color: rgb(228, 225, 225);
  cursor: pointer;
}
.szoveg-tipus{
  font-family:Georgia, 'Times New Roman', Times, serif;
}
</style>