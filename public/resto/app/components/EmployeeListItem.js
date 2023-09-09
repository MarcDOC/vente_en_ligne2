import { createElement } from "../dom.js"

export class EmployeeList {

    employees = []

    constructor(employees) {
        this.employees = employees
    }

    appendTo(element) {

        element.innerHTML = `
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Surnom</th>
                    <th>Numéro de téléphone</th>
                    <th>Poste</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                
            </tbody>
        </table>`

        const list = element.querySelector("tbody")
        for (let employee of this.employees) {
            const t = new EmployeeListItem(employee)
            t.appendTo(list)
        }
    }
}

class EmployeeListItem {

    element

    constructor(employee) {
        const tr = createElement('tr')
        const td_name = createElement('td')
        td_name.innerHTML = employee.name
        const td_surnom = createElement('td')
        td_surnom.innerHTML = employee.surnom
        const td_telephone = createElement('td')
        td_telephone.innerHTML = employee.telephone
        const td_poste = createElement('td')
        td_poste.innerHTML = employee.poste

        const td_btn = createElement('td', { class: 'text-end' })

        const btn_delete = createElement('a', {
            class: 'text-danger',
            href: '#',
            title: 'Supprimer',
        })
        btn_delete.innerHTML = `<i class="bi bi-trash"></i>`

        td_btn.append(btn_delete)

        tr.append(td_name)
        tr.append(td_surnom)
        tr.append(td_telephone)
        tr.append(td_poste)
        tr.append(td_btn)

        btn_delete.addEventListener('click', e => this.remove(e))

        this.element = tr
    }

    appendTo(element) {
        element.append(this.element)
    }

    remove(e) {
        e.preventDefault()
        if (confirm('êtes-vous sûr de vouloir supprimer ?')) {
            this.element.remove()
        }
    }
}