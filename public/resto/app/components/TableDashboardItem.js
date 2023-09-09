import { getPlaceOccuper } from "../database.js"
import { createElement } from "../dom.js"

export class TableDashboardItem {

    element

    constructor(table) {
        let placeDisponible =  parseInt(table.place) - parseInt(getPlaceOccuper(table.numero))
        const div_col = createElement('div', {
            class: 'col-md-3 d-flex'
        })

        const div_box = createElement('div', {
            class: 'boxTable flex-fill'
        })

        const div_text = createElement('div')
        div_text.innerHTML =
            `<h5>Table N° : ${table.numero}</h5>
            <p>Place disponible : ${placeDisponible}/${table.place}</p>
           <!-- <p>- 253 seconde</p>-->`

        div_box.append(div_text)
        div_col.append(div_box)

        this.element = div_col
    }

    appendTo(element) {
        element.append(this.element)
    }

    prependTo(element) {
        element.prepend(this.element)
    }

    remove(e) {
        e.preventDefault()
        if (confirm('êtes-vous sûr de vouloir supprimer ?')) {
            this.element.remove()
        }
    }
}