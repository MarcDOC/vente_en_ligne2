import {get, save } from "./database.js";
import { MenuItem } from "./components/MenuItem.js";

const boxListMenus = document.querySelector("#boxListMenus")
const menus = get("menu")

for (let menu of menus) {
    const t = new MenuItem(menu)
    t.appendTo(boxListMenus)
}

const addMenuForm = document.querySelector('#addMenuForm')
addMenuForm.addEventListener('submit', e => onSubmitFormAddMenu(e))

function onSubmitFormAddMenu(e) {
    e.preventDefault()
    const nom = new FormData(e.currentTarget).get('nom').toString().trim()
    const prix = new FormData(e.currentTarget).get('prix').toString().trim()
    const type = new FormData(e.currentTarget).get('type').toString().trim()
        //const photo = new FormData(e.currentTarget).get('photo')
    const duration = new FormData(e.currentTarget).get('duration').toString().trim()

    var filesSelected = document.getElementById("photo").files;
    //const srcData = "";
    if (filesSelected.length > 0) {
        var fileToLoad = filesSelected[0];
        var fileReader = new FileReader();
        fileReader.onload = function(fileLoadedEvent) {
            var srcData = fileLoadedEvent.target.result; // <--- data: base64

            console.log(srcData);

            const menu = {
                code: nom.slugify("-"),
                nom,
                prix,
                type,
                photo: srcData,
                duration,
            }

            const t = new MenuItem(menu)
            t.prependTo(boxListMenus)
            addMenuForm.reset()

            menus.push(menu)
            save('menu', menus)
        }
        fileReader.readAsDataURL(fileToLoad);
    }
}

String.prototype.slugify = function(separator = "-") {
    return this
        .toString()
        .normalize('NFD') // split an accented letter in the base letter and the acent
        .replace(/[\u0300-\u036f]/g, '') // remove all previously split accents
        .toLowerCase()
        .trim()
        .replace(/[^a-z0-9 ]/g, '') // remove all chars not letters, numbers and spaces (to be replaced)
        .replace(/\s+/g, separator);
};