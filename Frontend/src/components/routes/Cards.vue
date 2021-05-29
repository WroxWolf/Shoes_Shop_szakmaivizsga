<template>
  <div>
    <div class="my-container">
      <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4 p-5">
        <div v-for="(row, indexR) in rows" :key="indexR" class="col">
          <div class="card my-card">
            <img :src="getPicture(row.Kep)" class="card-img-top" alt="" />
            <div class="card-body">
              <h5 class="card-title">{{ row.Nev }}</h5>
              <p class="card-text">{{ row.Netto }}FT</p>
              <a
                href="#"
                class="my-href"
                data-bs-toggle="modal"
                data-bs-target="#exampleModal"
                @click="function(){getCipoById(row.Id);getCipoMeret(row.Id);}"
                >Részletek</a
              >
            </div>
          </div>
        </div>
      </div>
    </div>
    <div
      class="modal fade"
      id="exampleModal"
      tabindex="-1"
      aria-labelledby="exampleModalLabel"
      aria-hidden="true"
    >
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">
              {{ SelectedCipo.Nev }}
            </h5>
            <button
              type="button"
              class="btn-close"
              data-bs-dismiss="modal"
              aria-label="Close"
            ></button>
          </div>
          <div class="modal-body">
            <div class="card container-fluid">
              <img
                :src="getPicture(SelectedCipo.Kep)"
                class="card-img-top"
                alt=""
              />
              <div class="my-card-body">
                <h5 class="my-card-title">{{ SelectedCipo.Tipus }}</h5>
                <p class="card-text">
                  {{ SelectedCipo.Leiras }}
                </p>
                <!-- Meret -->
                <div class="dropdown text-center">
                  <button
                    class="btn btn-dark dropdown-toggle"
                    type="button"
                    id="dropdownMenuButton1"
                    data-bs-toggle="dropdown"
                    aria-expanded="false"
                  >
                    {{selectedMeret ? selectedMeret.Meret : ""}}
                  </button>
                  <ul
                    class="dropdown-menu"
                    aria-labelledby="dropdownMenuButton1"
                  >
                    <li><p class="dropdown-item" @click="selectedMeret = selectMeret" v-for="selectMeret in selectedMeretek" :key="selectMeret">{{selectMeret.Meret}}</p></li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn" data-bs-dismiss="modal">
              <i class="bi bi-x-lg"></i>
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
const axios = require("axios").default;

export default {
  name: "Cards",
  data() {
    return {
      queryGet: "CipoTabla",
      title: null,
      columns: [],
      rows: [],
      selectedCipo: null,
      selectedMeretek: null,
      selectedMeret:null,
      queryGetById: "CipoTablaById",
      queryGetMeret: "CipoMeretTabla",
    };
  },
  created() {
    this.getRows();
  },
  methods: {
    getRows() {
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
    getPicture(kep) {
      console.log(kep);
      
      try {
        return kep ? require("@/assets/" + kep) : "";
      } catch (error) {
        return require ("@/assets/no-image.png")
      }
    },
    getCipoById(Id) {
      axios
        .get(this.url, {
          params: {
            query: this.queryGetById,
            Id: Id,
          },
        })
        .then((res) => {
          this.resData = res.data;
          this.title = this.resData.title;
          this.columns = this.resData.columns;
          this.selectedCipo = this.resData.rows;
          console.log("Title:", this.title);
        })
        .catch((error) => {
          console.log(error);
        });
    },
    getCipoMeret(Id) {
      axios
        .get(this.url, {
          params: {
            query: this.queryGetMeret,
            Id: Id,
          },
        })
        .then((res) => {
          this.resData = res.data;
          this.title = this.resData.title;
          this.columns = this.resData.columns;
          this.selectedMeretek = this.resData.rows;
          this.selectedMeret = this.selectedMeretek[0];
          console.log("Title:", this.title);
        })
        .catch((error) => {
          console.log(error);
        });
    },
  },
  computed: {
    SelectedCipo() {
      return this.selectedCipo ? this.selectedCipo[0] : "";
    },
  },
};

</script>

<style>
.my-container {
  max-width: 1200px;
  margin: auto auto;
  font-family: 'Sigmar One', cursive;
}
.modal{
  font-family: 'Sigmar One', cursive;
}
.my-href {
  text-decoration: none;
  text-align: center;
  background-color: black;
  color: white;
  padding: 8px;
  border-radius: 5px;
}
.my-href:hover {
  color: white;
}
.card-body {
  text-align: center;
}
.div col {
  margin: auto auto;
}
.my-card-body {
  padding: 10px;
}
.modal-footer {
  margin: auto;
}
.my-card {
  box-shadow: black 6px 6px 15px;
}
.my-card:hover {
  box-shadow: black 10px 10px 25px;
}

</style>