import { createElement } from "../dom.js"

export class MenuItem {

    element

    constructor(menu) {
        const div_col = createElement('div', {
            class: 'col-md-3 d-flex'
        })

        const div_box = createElement('div', {
            class: 'boxMenus flex-fill'
        })

        const div_img = createElement('div', {
            class: 'img'
        })

        div_img.innerHTML = `<img src="${menu.photo}" alt="">`

        const div_text = createElement('div', {
            class: 'text',
        })
        div_text.innerHTML =
            `<p class="m-0 p-0">${menu.type}</p>
            <h5>${menu.nom}</h5>
            <p><b>Prix :</b> ${menu.prix} Frs</p>
            <p><b>Préparation :</b> ${menu.duration} min</p>`

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

        div_box.append(div_img)
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