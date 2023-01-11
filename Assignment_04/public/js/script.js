var gettableBody = document.getElementById('tableBody');
var updateRefreshName = document.getElementsByClassName("displayUpdateForName");
var updateRefreshEmail = document.getElementsByClassName("displayUpdateForEmail");
var updateRefreshPhone = document.getElementsByClassName("displayUpdateForPhone");
var updateRefreshAddress = document.getElementsByClassName("displayUpdateForAddress");
var updateRefreshMajor = document.getElementsByClassName("displayUpdateForMajor");
var updateNotRefreshId = document.getElementsByClassName("displayUpdateId");
var btnList = document.getElementsByClassName("btnList");

// Read Students Datas
axios.get('/api/students')
    .then(response => {
        response.data.forEach(item => {
            gettableBody.innerHTML += '<tr>' +
                '<td class="displayUpdateId">' + item.id + '</td>' +
                '<td class="displayUpdateForName">' + item.name + '</td>' +
                '<td class="displayUpdateForEmail">' + item.email + '</td>' +
                '<td class="displayUpdateForPhone">' + item.phone + '</td>' +
                '<td class="displayUpdateForAddress">' + item.address + '</td>' +
                '<td class="displayUpdateForMajor">' + item.major.name + '</td>' +
                '<td class="btnList">' +
                '<button type="button" class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#exampleModal" onclick="editBtn('+item.id+')">Update</button>' +
                '<button type="button" class="btn btn-sm btn-danger mx-2" data-bs-toggle="modal" data-bs-target="#deleteStudent"  onclick="deleteBtn('+item.id+')">Delete</button>' +
                '</td>' +
                '</tr>';
        });
    })
    .catch(error => {
        console.log(error);
        if (error.response.status = 404) {
            console.log(' " ' + error.response.config.url + ' " ' + 'url is not found');
        }
    });

// Create Students Datas
axios.get('/api/majors')
    .then(response => {
        var getSelect = document.querySelector('.getSelect');
        response.data.forEach(item => {
            const node = document.createElement("option");
            node.setAttribute("value", item.id);
            node.setAttribute("name", "majorName");
            var optionText = item.name ;
            const newOption = document.createTextNode(optionText);
            node.appendChild(newOption);
            getSelect.appendChild(node);
        });
    })
    .catch(error => {
        console.log(error);
        if (error.response.status = 404) {
            console.log(' " ' + error.response.config.url + ' " ' + 'url is not found');
        }
    });
var createStudent = document.forms['createStudent'];
var createName = createStudent['createName'];
var createEmail = createStudent['createEmail'];
var createPhone = createStudent['createPhone'];
var createAddress = createStudent['createAddress'];
var createMajor = createStudent['getmajorId'];
createStudent.onsubmit = function (e) {
    e.preventDefault();
     axios.post('/api/students', {
        name: createName.value,
            email: createEmail.value,
        phone: createPhone.value,
            address: createAddress.value,
            major_id: createMajor.value
    })
         .then(response => {
             console.log(response.data);
             if (response.data.msg == "Student Created Successfully!!!") {
                SuccessAlertMsg(response.data.msg);
                 createStudent.reset();
                 console.log(response.data);
                 gettableBody.innerHTML += '<tr>' +
                 '<td class="displayUpdateId">' + response.data[0].id + '</td>' +
                 '<td class="displayUpdateForName">' + response.data[0].name + '</td>' +
                 '<td class="displayUpdateForEmail">' + response.data[0].email + '</td>' +
                 '<td class="displayUpdateForPhone">' + response.data[0].phone + '</td>' +
                 '<td class="displayUpdateForAddress">' + response.data[0].address + '</td>' +
                 '<td class="displayUpdateForMajor">' + response.data[1].name + '</td>' +
                 '<td class="btnList">' +
                 '<button type="button" class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#exampleModal" onclick="editBtn('+response.data[0].id+')">Update</button>' +
                 '<button type="button" class="btn btn-sm btn-danger mx-2" data-bs-toggle="modal" data-bs-target="#deleteStudent"  onclick="deleteBtn('+response.data[0].id+')">Delete</button>' +
                 '</td>' +
                 '</tr>';
                 $("#createStudent").modal("hide");
                
             } else {
                 console.log(response.data.msg);
                if (createName.value == "") {
                    document.getElementById("errorName").innerHTML = response.data.msg.name; 
                } else {
                    document.getElementById("errorName").innerHTML = ""; 
                }
                if (createEmail.value == "") {
                    document.getElementById("errorEmail").innerHTML = response.data.msg.email;
                } else {
                    document.getElementById("errorEmail").innerHTML = "";  
                }
                if (createPhone.value == "") {
                    document.getElementById("errorPhone").innerHTML = response.data.msg.phone;  
                } else {
                    document.getElementById("errorPhone").innerHTML = "";  
                }
                if (createAddress.value == "") {
                    document.getElementById("errorAddress").innerHTML = response.data.msg.address;
                } else {
                    document.getElementById("errorAddress").innerHTML = "";
                 }
                 if (createMajor.value == "") {
                    document.getElementById("errorMajor").innerHTML = response.data.msg.major_id;
                } else {
                    document.getElementById("errorMajor").innerHTML = "";
                }
            }
    })
        .catch(error => console.log(error.response));   
}

//Reset Create Form
function resetForm() {
    createStudent.reset();
    document.getElementById("errorName").innerHTML = ""; 
    document.getElementById("errorEmail").innerHTML = ""; 
    document.getElementById("errorPhone").innerHTML = ""; 
    document.getElementById("errorAddress").innerHTML = "";
    document.getElementById("errorMajor").innerHTML = "";
}

  // Edit Students Datas Show With Respective Id
  axios.get('/api/majors')
    .then(response => {
        var editSelect = document.querySelector('.editSelect');
        response.data.forEach(item => {
            const node = document.createElement("option");
            node.setAttribute("value", item.id);
            node.setAttribute("name", "majorName");
            var optionText = item.name ;
            const newOption = document.createTextNode(optionText);
            node.appendChild(newOption);
            editSelect.appendChild(node);
        });
    })
    .catch(error => {
        console.log(error);
        if (error.response.status = 404) {
            console.log(' " ' + error.response.config.url + ' " ' + 'url is not found');
        }
    });
var editForm = document.forms['editForm'];
var getEditName = editForm['name'];
var getEditEmail = editForm['email'];
var getEditPhone = editForm['phone'];
var getEditAddress = editForm['address'];
var editStudentId;
var updateOldName;
function editBtn(studentId) {
    editStudentId = studentId;
        axios.get('/api/students/' + studentId)
            .then(response => {
                getEditName.value = response.data.name; 
                getEditEmail.value = response.data.email; 
                getEditPhone.value = response.data.phone; 
                getEditAddress.value = response.data.address; 
                var editSelect = document.querySelector('.editSelect');
                const getNode = document.createElement("option");
                getNode.setAttribute("value", response.data.major_id);
                var optionText = response.data.major.name;
                const newOption = document.createTextNode(optionText);
                getNode.appendChild(newOption);
                var getReplaceItem = editSelect.firstChild;
                editSelect.replaceChild(getNode, getReplaceItem);

                updateOldName = response.data.name;
                updateOldEmail = response.data.email;
                updateOldPhone = response.data.phone;
                updateOldAddress = response.data.address;
                updateOldMajor = response.data.major;
            })
            .catch(error=>console.log(error.response));
}
     
// Update Student Datas
var getEditMajor = editForm['edit_major_id'];
editForm.onsubmit = function (e) {
    e.preventDefault();
    axios.put('/api/students/'+editStudentId, {
        name: getEditName.value,
        email: getEditEmail.value,
    phone: getEditPhone.value,
        address: getEditAddress.value,
        major_id: getEditMajor.value
    }).
        then(response => {
            if (response.data.msg == "Student Updated Successfully!!!") {
                SuccessAlertMsg(response.data.msg);
                $("#exampleModal").modal("hide");
                for (var i = 0; i < updateNotRefreshId.length; i++) {
                    if (updateRefreshName[i].innerHTML == updateOldName) {
                        updateRefreshName[i].innerHTML = getEditName.value;
                        updateRefreshEmail[i].innerHTML = getEditEmail.value;
                        updateRefreshPhone[i].innerHTML = getEditPhone.value;
                        updateRefreshAddress[i].innerHTML = getEditAddress.value;
                        updateRefreshMajor[i].innerHTML = response.data[0].name;
                    }
                }
            } else {
                if (getEditName.value == "") {
                    document.getElementById("errorEditName").innerHTML = response.data.msg.name; 
                } else {
                    document.getElementById("errorEditName").innerHTML = ""; 
                }
                if (getEditEmail.value == "") {
                    document.getElementById("errorEditEmail").innerHTML = response.data.msg.email;
                } else {
                    document.getElementById("errorEditEmail").innerHTML = "";  
                }
                if (getEditPhone.value == "") {
                    document.getElementById("errorEditPhone").innerHTML = response.data.msg.phone;  
                } else {
                    document.getElementById("errorEditPhone").innerHTML = "";  
                }
                if (getEditAddress.value == "") {
                    document.getElementById("errorEditAddress").innerHTML = response.data.msg.address;
                } else {
                    document.getElementById("errorEditAddress").innerHTML = "";
                }
            }
        })
        .catch(error=>console.log(error.response));
}

//Reset Edit Form
function resetEditForm() {
    document.getElementById("errorEditName").innerHTML = ""; 
    document.getElementById("errorEditEmail").innerHTML = ""; 
    document.getElementById("errorEditPhone").innerHTML = ""; 
    document.getElementById("errorEditAddress").innerHTML = "";
}

//Delete Student 
var togetId;
function deleteBtn(value) { 
    togetId = value;
}

document.getElementById("getDeleteStudentId").addEventListener("click", function() {
        var deleteStudentId = togetId;
        axios.delete('/api/students/delete/'+deleteStudentId)
        .then(response => {       
            if (response.data.msg == 'Student Deleted Successfully!!!') {
                SuccessAlertMsg(response.data.msg); 
                $("#deleteStudent").modal("hide");
                for (var i = 0; i < updateNotRefreshId.length; i++) {
                    if (updateRefreshName[i].innerHTML == response.data.deletedStudent.name) {
                        updateNotRefreshId[i].style.display = "none";
                        updateRefreshName[i].style.display = "none"; 
                        updateRefreshEmail[i].style.display = "none"; 
                        updateRefreshPhone[i].style.display = "none"; 
                        updateRefreshAddress[i].style.display = "none"; 
                        updateRefreshMajor[i].style.display = "none"; 
                        btnList[i].style.display = "none";
                    }
                }
            }
        })
        .catch(error=>console.log(error.response)); 
    })

// Helper Functions
function SuccessAlertMsg(val) {
    document.getElementById("successMsg").innerHTML = '<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>' + val + '</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';    
}
