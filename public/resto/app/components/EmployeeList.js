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