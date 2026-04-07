import './bootstrap';
import Swal from 'sweetalert2'
window.SwalAlert = Swal;
// console.log('Hello form app js!');    

const searchInput = document.getElementById('task_search');
searchInput.addEventListener('keyup', SearchTask);
function SearchTask() {
  // Get the search query from the input field
  var search = document.querySelector('input[name="search"]').value;

    // Make an AJAX request to the server with the search query
    axios.get('/task/search', {
      params: {
        search_task: search
      }
    })
    .then(function (response) {
     let html = '';
      response.data.forEach(task => {
        html += `<tr>
            <td>${task.id}</td>
            <td>${task.title}</td>
            <td>${task.description}</td>
            <td>${task.user.name}</td>
            <td>
              <div class="btn-group" role="group" aria-label="Basic example">
              <a href="/task/edit/${task.id}" class="btn btn-secondary">Edit</a>
              <a href="/task/show/${task.id}" class="btn btn-secondary">View</a>
              <button type="button" class="btn btn-secondary" onclick="deleteTask(${task.id})">Delete</button>
            </div>
            </td>
            </tr>`;
      });
      // console.log(html);
        document.getElementById('task_table_body').innerHTML = html;
      // document.querySelector('tbody').innerHTML = html;
      // Handle the response from the server (e.g., update the task list)
    })
    .catch(function (error) {
      console.log('Error:', error);
    });
}