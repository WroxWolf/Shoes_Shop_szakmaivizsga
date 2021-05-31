import Home from "../components/routes/Home.vue";
import Kapcsolat from "../components/routes/kapcsolat.vue";
import Cards from "../components/routes/Cards.vue";
import CipoTabla from "../components/routes/CipoTabla.vue";
import MarkaTabla from "../components/routes/MarkaTabla.vue";
import MeretTabla from "../components/routes/MeretTabla.vue";
import SzinTabla from "../components/routes/SzinTabla.vue";
import TipusTabla from "../components/routes/TipusTabla.vue";
import Felhasznalo from "../components/routes/Felhasznalo.vue";
import Kosar from "../components/routes/Kosar.vue";

const routes =[
    {
        name: "home",
        path: "/",
        component: Home
    },
    {
        name: "kapcsolat",
        path: "/kapcsolat/",
        component: Kapcsolat
    },
    {
        name: "cards",
        path: "/cards/",
        component: Cards
    },
    {
        name: "cipotabla",
        path: "/CipoTabla/",
        component: CipoTabla
    },
    {
        name: "markatabla",
        path: "/MarkaTabla/",
        component: MarkaTabla
    },
    {
        name: "merettabla",
        path: "/MeretTabla/",
        component: MeretTabla
    },
    {
        name: "szintabla",
        path: "/SzinTabla/",
        component: SzinTabla
    },
    {
        name: "tipustabla",
        path: "/TipusTabla/",
        component: TipusTabla
    },
    {
        name: "felhasznalo",
        path: "/Felhasznalo/",
        component: Felhasznalo
    },
    {
        name: "kosar",
        path: "/Kosar/",
        component: Kosar
    },
];

export default routes;