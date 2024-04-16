document.addEventListener("DOMContentLoaded", function() {
    loadBooks();
    
    // Pievienot grāmatas formai submit event listener
    document.getElementById("add-book-form").addEventListener("submit", function(event) {
        event.preventDefault();
        addBook();
    });
});

function loadBooks() {
    // Jūsu JavaScript kods, kas ielādē grāmatu sarakstu no servera un renderē to uz ekrāna
}

function addBook() {
    // Iegūstam formas ievades vērtības
    var title = document.getElementById("title").value;
    var author = document.getElementById("author").value;
    var year = document.getElementById("year").value;

    // Izveidojam jaunu XMLHttpRequest objektu
    var xhr = new XMLHttpRequest();

    // Uzstādām metodi un URL, uz kuru nosūtīsim pieprasījumu
    xhr.open("POST", "backend.php", true);

    // Uzstādām virsrakstu, kas norāda, ka šis pieprasījums ir JSON
    xhr.setRequestHeader("Content-Type", "application/json");

    // Definējam, kas jādara, kad saņemsim atbildi no servera
    xhr.onload = function() {
        if (xhr.status >= 200 && xhr.status < 300) {
            // Veiksmīgi pievienojām grāmatu, atjaunojam sarakstu
            loadBooks();
        } else {
            // Kļūda, izvadam kļūdas ziņojumu
            console.error(xhr.responseText);
        }
    };

    // Sagatavojam datus, ko nosūtīsim kā JSON
    var data = JSON.stringify({ title: title, author: author, year: year });

    // Nosūtam pieprasījumu ar sagatavotajiem datiem
    xhr.send(data);
}

function deleteBook(bookId) {
    // Izveidojam jaunu XMLHttpRequest objektu
    var xhr = new XMLHttpRequest();

    // Uzstādām metodi un URL, uz kuru nosūtīsim pieprasījumu
    xhr.open("DELETE", "backend.php?id=" + bookId, true);

    // Definējam, kas jādara, kad saņemsim atbildi no servera
    xhr.onload = function() {
        if (xhr.status >= 200 && xhr.status < 300) {
            // Veiksmīgi dzēsām grāmatu, atjaunojam sarakstu
            loadBooks();
        } else {
            // Kļūda, izvadam kļūdas ziņojumu
            console.error(xhr.responseText);
        }
    };

    // Nosūtam pieprasījumu
    xhr.send();
}
