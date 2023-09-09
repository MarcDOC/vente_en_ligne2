import { createElement } from "../dom.js"

export class CommandeItem {

    element

    constructor(commande) {
        const div_col = createElement('div', {
            class: 'col-md-3 d-flex'
        })

        const div_box = createElement('div', {
            class: 'boxTable flex-fill'
        })
        //creer une nouvelle commande

        const div_text = createElement('div')
        div_text.innerHTML =
            `<h5>Commande N° : ${commande.numero}</h5>
            <p><b>table concerné :</b> ${commande.numero_table}</p>
            <p><b>nombre de personne  :</b> ${commande.nombre_personne}</p>
            <p><b>prix total :</b> ${commande.prix_total} Frs</p>
            <p><b>contenu de la commande :</b></p>
            <table>
                <tr>
                    <th class="pe-2">quantite</th>
                    <th>menu</th>
                </tr>
                <tr>
                    <td>${commande.contenu[0].quantite}</td>
                    <td>${commande.contenu[0].menu}</td>
                </tr>
            </table>`

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

        //div_btn.append(btn_update)
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