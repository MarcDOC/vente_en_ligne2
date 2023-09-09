import { createElement } from "../dom.js"

export class TableItem {

    element

    constructor(table) {
        const div_col = createElement('div', {
            class: 'col-md-3 d-flex'
        })

        const div_box = createElement('div', {
            class: 'boxTable flex-fill'
        })

        const div_text = createElement('div')
        div_text.innerHTML =
            `<h5>Table N° : ${table.numero}</h5>
            <p><b>Place :</b> ${table.place}</p>
            <p><b>Forme :</b> ${table.forme}</p>
            <p><b>Position :</b> ${table.position}</p>`

        const div_btn = createElement('div', {
            class: 'boxBtn'
        })

        const btn_update = createElement('a', {
            class: 'text-primary',
            href: '#',
            title: 'Modifier',
        })
        btn_update.innerHTML = `<i class="bi bi-pen"></i>`

        const btn_delete = createElement('a', {
            class: 'text-danger',
            href: '#',
            title: 'Supprimer',
        })
        btn_delete.innerHTML = `<i class="bi bi-trash"></i>`

        div_btn.append(btn_update)
        div_btn.append(btn_delete)

        div_box.append(div_text)
        div_box.append(div_btn)
        div_col.append(div_box)

        btn_delete.addEventListener('click', e => this.remove(e))

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