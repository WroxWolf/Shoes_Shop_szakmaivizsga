<template>
  <div>
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
    <div class="table-responsive">
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
                <!-- Cipo -->
                <div class="col-md-6">
                  <label for="Cipo" class="form-label">Cipő</label>
                  <select class="form-select" v-model="row.Id">
                    <option v-for="cipoErtek in cipoRow"
                    :key="cipoErtek.Id"
                    :value="cipoErtek.Id"
                    :selected="cipoErtek.Id == row.Id ? 'selected' : ''"
                     >
                     {{cipoErtek.Nev}}
                    </option>
                  </select>
                  <div class="invalid-feedback">Kötelező!</div>
                </div>
                <!-- Méret -->
                <div class="col-md-6">
                  <label for="Meret" class="form-label">Méret</label>
                  <select class="form-select" v-model="row.MeretId">
                    <option v-for="meretErtek in meretRow"
                    :key="meretErtek.MeretId"
                    :value="meretErtek.MeretId"
                    :selected="meretErtek.MeretId == row.MeretId ? 'selected' : ''"
                     >
                     {{meretErtek.Meret}}
                    </option>
                  </select>
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

class CipoMeret {
  constructor(Id,Nev,MeretId,Meret) {
        this.Id = Id;
        this.Nev = Nev;
        this.MeretId = MeretId;
        this.Meret = Meret;
  }
}

export default {
  name: "CipoMeretek",
  data() {
    return {
      queryGet: "CipoMeretTabla",
      cipoGet: "CipoTabla",
      meretGet: "MeretTabla",
      title: null,
      columns: [],
      rows: [],
      //Rowok
      cipoRow: [],
      meretRow: [],
      MarkaRow: [],

      resData: null,
      row: new CipoMeret(0, null,0,null),
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
    this.getCipo();
    this.getMeret();
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
    getCipo(){
      axios
        .get(this.url, {
          params: {
            query: this.cipoGet,
          },
        })
        .then((res) => {
          this.resData = res.data;
          this.cipoRow = this.resData.rows;
        })
        .catch((error) => {
          console.log(error);
        });
    },
    getMeret(){
      axios
        .get(this.url, {
          params: {
            query: this.meretGet,
          },
        })
        .then((res) => {
          this.resData = res.data;
          this.meretRow = this.resData.rows;
        })
        .catch((error) => {
          console.log(error);
        });
    },
    deleteRow(id,meretId) {
      console.log(id);
      //post
      let params = {
        query: "CipoMeretDeleteById",
        Id: id,
        MeretId: meretId,
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
        query: "CipoMeretUpdateById",
        Id: this.row.Id,
        MeretId: this.row.MeretId,
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
        query: "CipoMeretInsertById",
        Id: this.row.Id,
        MeretId: this.row.MeretId
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
      let meretId = row.MeretId;
      if (confirm("Töröljem?")) {
        this.deleteRow(id,meretId);
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
      this.modalTitle = "új méret bevitele";
      this.status = "insert"
      this.row = new CipoMeret(0, null,0,null);

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
      this.form.classList.remove("was-validated")
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
</style>