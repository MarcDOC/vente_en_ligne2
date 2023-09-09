import {get, save } from "./database.js";
import { EmployeeItem } from "./components/EmployeeItem.js";

//const list_employees = new EmployeeList(employees)
//list_employees.appendTo(document.querySelector('#boxListEmployees'))

//console.log(employees);
//listeEmployee.innerText = 'Bonjor le monde'
//console.log(listeEmployee);
//document.body.append(listeEmployee)
//document.body.prepend(listeEmployee)

const boxListEmployees = document.querySelector("#boxListEmployees")
const employees = get("employee")

for (let employee of employees) {
    const t = new EmployeeItem(employee)
    t.appendTo(boxListEmployees)
}

const addEmployeeForm = document.querySelector('#addEmployeeForm')
addEmployeeForm.addEventListener('submit', e => onSubmitFormAddEmployee(e))

function onSubmitFormAddEmployee(e) {
    e.preventDefault()
    const name = new FormData(e.currentTarget).get('name').toString().trim()
    const surnom = new FormData(e.currentTarget).get('surnom').toString().trim()
    const telephone = new FormData(e.currentTarget).get('telephone').toString().trim()
    const poste = new FormData(e.currentTarget).get('poste').toString().trim()

    const employee = { name, surnom, telephone, poste, }

    const t = new EmployeeItem(employee)
    t.prependTo(boxListEmployees)
    addEmployeeForm.reset();

    employees.push(employee)
    save('employee', employees)
}