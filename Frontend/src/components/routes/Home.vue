<template>
  <div class="home-page">
    <div
      id="carouselExampleFade"
      class="carousel slide carousel-fade"
      data-bs-ride="carousel"
    >
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="@/assets/Artego_sportcipo_feher.png" class="d-block w-100" alt="" />
        </div>
        <div class="carousel-item">
          <img src="@/assets/Kalenji_sportcipo_narancssarga.png" class="d-block w-100" alt="" />
        </div>
        <div class="carousel-item">
          <img src="@/assets/Quechua_bakancs_fekete.png" class="d-block w-100" alt="" />
        </div>
      </div>
      <button
        class="carousel-control-prev"
        type="button"
        data-bs-target="#carouselExampleFade"
        data-bs-slide="prev"
      >
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button
        class="carousel-control-next"
        type="button"
        data-bs-target="#carouselExampleFade"
        data-bs-slide="next"
      >
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>
  </div>
</template>

<script>
export default {
  name: "Home",
};
</script>

<style>
.home-page{
  max-width: 1200px;
  margin:auto auto;
}
</style>