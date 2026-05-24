<!DOCTYPE html>
<html lang="en" ng-app="StarterApp">
<head>
<meta charset="UTF-8">
<title>Guest Data</title>

<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.7.9/angular.min.js"></script>
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link rel="prefetch" href="index.php">
<link rel="prefetch" href="Update_Form.php">
<link rel="preload" as="image" href="Sky_Serene_4k.jpg">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
    
<style>
* {
  box-sizing: border-box;
}

html, body {
  height: 100%;
  margin: 0;
  overflow: hidden;   /* STOP SCROLL */
}

body {
  font-family: Arial;
  min-height: 100vh;

  background: url("Sky_Serene_4k.jpg") no-repeat center/cover;
  background-attachment: fixed;

  display: flex;
  justify-content: center;

  align-items: center;   /* DEFAULT = PC centered */
  padding: 10px;
}    

.wrapper {
  width: 100%;
  max-width: 340px;
}

.top-bar {
  width: 100%;
  display: flex;
  justify-content: space-between; /* THIS is the key */
  align-items: center;
  margin-bottom: 6px;
}

.search-input {
  width: 100%;
  max-width: 220px;
  margin-right: 0;
  padding: 10px;
  border-radius: 8px;
  border: 1px solid rgba(255,255,255,0.3);
  background: rgba(255,255,255,0.1);
  backdrop-filter: blur(10px);
  color: #fff;
  outline: none;
  box-shadow: 0 8px 30px rgba(0,0,0,0.3);
}

.search-input::placeholder {
  color: rgba(255,255,255,0.7);
}

.search-input:focus {
  border: 1px solid rgba(255,255,255,0.6);
  box-shadow: 0 6px 25px rgba(0,0,0,0.35);
}
.table-wrapper {
  backdrop-filter: blur(12px);
  background: rgba(255,255,255,0.1);
  padding: 20px;
  border-radius: 12px;
  width: 100%;
  box-shadow: 0 8px 30px rgba(0,0,0,0.3);
}

table {
  width: 100%;
  border-collapse: collapse;
  color: #fff;
}

th, td {
  padding: 12px;
  text-align: center;
}

th {
  background: rgba(255,255,255,0.2);
}

tr:hover {
  background: rgba(255,255,255,0.1);
}

img {
  border-radius: 50%;
}

.menu-cell {
  position: relative;
}

.menu-btn {
  background: none;
  border: none;
  color: white;
  font-size: 20px;
  cursor: pointer;
}

.menu-dropdown {
  position: absolute;
  right: 0;
  top: 25px;
  background: rgba(0,0,0,0.9);
  border-radius: 6px;
  overflow: hidden;
  min-width: 100px;
  z-index: 100;
}

.menu-dropdown div {
  padding: 10px;
  cursor: pointer;
}

.menu-dropdown div:hover {
  background: rgba(255,255,255,0.2);
}

.pagination {
  text-align: center;
  margin-top: 15px;
}

.pagination button {
  margin: 3px;
  padding: 6px 10px;
  border: none;
  border-radius: 5px;
  background: rgba(255,255,255,0.2);
  color: white;
  cursor: pointer;
}

/* HOVER ONLY for NON-ACTIVE */
.pagination button:not(.active):hover {
  background: rgba(255,255,255,0.4);
  transform: translateY(-1px);
}

/* ACTIVE PAGE */
.pagination button.active {
  background: rgba(255,255,255,0.8);
  color: black;
  cursor: default;
}

.pagination .active {
  background: white;
  color: black;
}
    
.alert {
  position: fixed;
  top: 20px;
  right: 20px;
  padding: 15px;
  color: white;
  border-radius: 6px;
  z-index: 9999;
  min-width: 220px;
  box-shadow: 0 6px 20px rgba(0,0,0,0.3);

  opacity: 0;                  /* start hidden */
  transform: translateY(-10px);/* slight move */
  transition: all 0.4s ease;   /* smooth */
}

/* SHOW (fade in) */
.alert.show {
  opacity: 1;
  transform: translateY(0);
}

/* HIDE (fade out) */
.alert.hide {
  opacity: 0;
  transform: translateY(-10px);
} 

.success {
  background-color: #4CAF50;
}

.closebtn {
  float: right;
  margin-left: 10px;
  cursor: pointer;
}
    
.modal {
  position: fixed;
  z-index: 9999;
  left: 0;
  top: 0;
  width: 100%;
  height: 100%;
  background: rgba(0,0,0,0.6);
}

.modal-box {
  background: rgba(255,255,255,0.1);
  backdrop-filter: blur(12px);
  margin: 15% auto;
  padding: 20px;
  width: 300px;
  border-radius: 10px;
  text-align: center;
  color: #fff;
}

.modal-actions {
  margin-top: 15px;
}

.modal-actions button {
  padding: 8px 14px;
  margin: 5px;
  border: none;
  cursor: pointer;
  border-radius: 6px;
  transition: 0.2s;
}

.confirm {
  background: rgba(255,255,255,0.2);
  color: white;
}

.confirm:hover {
  background: #f44336; /* red */
}

/* NO (cancel) */
.cancel {
  background: rgba(255,255,255,0.2);
  color: white;
}

.cancel:hover {
  background: #4CAF50; /* green */
}

[ng-cloak] {
  display: none !important;
}

.back-btn {
  background: rgba(255,255,255,0.1);
  border: none;
  color: white;

  width: 40px;
  height: 40px;
  border-radius: 8px;

  display: flex;
  align-items: center;
  justify-content: center;

  cursor: pointer;
  backdrop-filter: blur(10px);
}

.back-btn:hover {
  background: rgba(255,255,255,0.25);
}

@media (max-width: 600px) {

  .table-wrapper {
 	 backdrop-filter: blur(12px);
 	 background: rgba(255,255,255,0.1);

 	 width: 100%;
 	 max-width: 100%;

 	 padding: 14px;       /* smaller overall */
 	 border-radius: 10px; /* slightly tighter */

 	 box-shadow: 0 8px 30px rgba(0,0,0,0.3);
  }

  table {
    font-size: 11px; /* slightly smaller */
  }

  th {
    font-size: 12px;
  }

  th, td {
    padding: 5px 3px;  /* tighter spacing */
    word-break: break-word;
  }
  
  body {
    align-items: flex-start;
    padding-top: 60px;
  }

  img {
    width: 26px; /* smaller avatar */
  }

  .search-input {
    padding: 8px;
    font-size: 13px;
  }

  .pagination button {
    padding: 4px 8px;
    font-size: 12px;
  }

}
</style>
</head>

<body ng-controller="AppCtrl" ng-cloak>

<div id="successBox" class="alert success" style="display:none;">
  <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
  <span id="msgText"></span>
</div>    

<div id="deleteModal" class="modal" ng-show="showModal">
  <div class="modal-box">
    <p>Are you sure you want to delete this?</p>

    <div class="modal-actions">
      <button class="confirm" ng-click="confirmDelete()">Yes</button>
      <button class="cancel" ng-click="closeModal()">No</button>
    </div>
  </div>
</div>
    
<div class="table-container">

  <div class="top-bar">

    <button class="back-btn" onclick="goRegister()">
      <span class="material-icons">arrow_back</span>
    </button>

  	<input type="text"
      ng-model="searchText"
      placeholder="Search name or email..."
      class="search-input">

  </div>

  <div class="table-wrapper">

    <table>
      <tr>
        <th></th>
        <th>Name</th>
        <th>Email</th>
        <th>Date</th>
        <th></th>
      </tr>

      <tr ng-repeat="c in filtered = (content | filter:searchText) 
               | limitTo:itemsPerPage:currentPage*itemsPerPage track by c.id">

        <td><img ng-src="{{c.thumb}}" width="40"></td>
        <td>{{c.name}}</td>
        <td>{{c.description}}</td>
        <td>{{c.last_modified}}</td>

        <td class="menu-cell">
          <button class="menu-btn"
        	ng-click="toggleMenu($index); $event.stopPropagation(); $event.preventDefault()">⋮</button>

          <div class="menu-dropdown" ng-show="activeMenu === $index" ng-click="$event.stopPropagation()">
            <div ng-click="edit(c)">Edit</div>
            <div ng-click="openDeleteModal(c, $event)">Delete</div>
          </div>
        </td>
      </tr>
    </table>

    <div class="pagination">
      <button ng-click="prevPage()">‹</button>

      <button ng-repeat="i in getPages() track by $index"
              ng-click="setPage($index)"
              ng-class="{'active': currentPage === $index}">
        {{$index+1}}
      </button>

      <button ng-click="nextPage()">›</button>
    </div>

  </div>
</div>

<script>
var app = angular.module('StarterApp', []);
var deleteId = null;
    
app.controller('AppCtrl', function($scope, $http, $document) {

  $scope.content = [];
    
  $scope.$watch('searchText', function() {
    $scope.currentPage = 0;
  });
    
  $scope.activeMenu = null;
  $scope.showModal = false;

  function loadData() {
    $http.get("Registration.php").then(function(res) {
      $scope.content = res.data;
    });
  }

  loadData();

  $scope.toggleMenu = function(index) {
    $scope.activeMenu = ($scope.activeMenu === index) ? null : index;
  };

  $scope.edit = function(item) {
  window.location.href =
    "Update_Form.php?id=" + item.id +
    "&firstname=" + item.name.split(" ")[0] +
    "&lastname=" + item.name.split(" ")[1] +
    "&email=" + item.description;
  };
    
    $scope.confirmDelete = function() {
      if (deleteId === null) return;

      const id = deleteId;
      deleteId = null;

      $scope.showModal = false;

      $http.get("Delete.php?id=" + id).then(function() {
  	    showAlert("Deleted successfully");
  	    loadData(); // reload table WITHOUT page refresh
      });
    };
    
  $scope.openDeleteModal = function(item, $event) {
      console.log("CLICK DELETE", item.id);

      $event.stopPropagation();
      $event.preventDefault();
      $scope.activeMenu = null;

      deleteId = item.id;

      console.log("SET deleteId =", deleteId);

      $scope.showModal = true;
    };
    
  $scope.closeModal = function() {
 	 $scope.showModal = false;
  	deleteId = null;
	};
    
  $scope.itemsPerPage = 5;
  $scope.currentPage = 0;

  $scope.getPages = function() {
    return new Array(Math.ceil(($scope.filtered ? $scope.filtered.length : 0) / $scope.itemsPerPage));
  };

  $scope.setPage = function(p) {
    $scope.currentPage = p;
  };

  $scope.nextPage = function() {
    if ($scope.currentPage < $scope.getPages().length - 1) {
      $scope.currentPage++;
    }
  };

  $scope.prevPage = function() {
    if ($scope.currentPage > 0) {
      $scope.currentPage--;
    }
  };
    
  $document = angular.element(document);

  $document.on('click', function() {
    $scope.$apply(function() {
      $scope.activeMenu = null;
    });
  });

});

const params = new URLSearchParams(window.location.search);

if (params.get("msg") === "2") {
  showAlert("Updated successfully");
  window.history.replaceState({}, document.title, "Table.php");
}

function showAlert(message) {
  const box = document.getElementById("successBox");
  const text = document.getElementById("msgText");

  text.innerText = message;
  box.style.display = "block";

  // trigger fade in
  setTimeout(() => {
    box.classList.add("show");
  }, 10);

  // fade out after 1s
  setTimeout(() => {
    box.classList.remove("show");
    box.classList.add("hide");

    setTimeout(() => {
      box.style.display = "none";
      box.classList.remove("hide");
    }, 400);
  }, 1000);
}

function goRegister() {
  const overlay = document.createElement("div");

  overlay.style.position = "fixed";
  overlay.style.top = "0";
  overlay.style.left = "0";
  overlay.style.width = "100%";
  overlay.style.height = "100%";
  overlay.style.background = "url('Sky_Serene_4k.jpg') no-repeat center/cover";
  overlay.style.zIndex = "999999";

  document.body.appendChild(overlay);

  // slightly longer delay = smoother
  setTimeout(() => {
    window.location.href = "index.php";
  }, 300);
}
deleteId = null;
</script>

</body>
</html>