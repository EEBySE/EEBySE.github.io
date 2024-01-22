let nestedAccordionCounter = 1; // Initialize a counter
var phpSupport = false;

const check_php = () => {
    const uniqueIdentifier = Date.now(); // Create a unique identifier or timestamp

    // Make an AJAX request to a PHP script with a query parameter
    fetch(`check_php.php?id=${uniqueIdentifier}`)
        .then(response => {
            if (response.ok) {
                return response.text();
            } else {
                throw new Error('PHP script request failed, php hrefs will link to #');
            }
        })
        .then(data => {
            // Check if the received data contains the expected identifier
            if (data.includes(uniqueIdentifier)) {
                console.log('PHP is working a:', data);
                this.phpSupport = true;
            } else throw new Error('Invalid PHP response, php hrefs will link to #');
        })
        .catch(error => {
            console.error('PHP is not working, php hrefs will link to #:', error.message);
        });
};

document.addEventListener('DOMContentLoaded', check_php);

function getNestedAccordion(title = "Título", img = "media/Juan.jpg", img_alt = "Juan es grande", item_text = "Mucho texto \n".repeat(10), ejercicios = []) {
    // Increment the counter for each new nested accordion
    const uniqueId = nestedAccordionCounter++;
    const img_loc = "media/team/{image}.webp";
    const html_ejercicios = '<li><a href="php_exs/{mem}/{file}.php">{file_title}</a></li>';
    let process_ejercicios = "<ul>";
    ejercicios.forEach((e) => {
        process_ejercicios += `\n${html_ejercicios.replace('{mem}', img).replace("{file}", e).replace("{file_title}", e.toUpperCase())}`;
    });
    process_ejercicios += "</ul>";

    const nestedAccordionHTML = `
        <!-- Nested accordion -->
        <div class="accordion" id="nestedAccordion${uniqueId}">
            <div class="accordion-item">
                <h2 class="accordion-header" id="nestedHeading${uniqueId}">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#nestedCollapse${uniqueId}" aria-expanded="true" aria-controls="nestedCollapse${uniqueId}">
                        ${title}
                    </button>
                </h2>
                <div id="nestedCollapse${uniqueId}" class="accordion-collapse collapse" aria-labelledby="nestedHeading${uniqueId}" data-bs-parent="#nestedAccordion${uniqueId}">
                    <div class="accordion-body">
                        <div class="item-content">
                            <img src="${(img.startsWith("media") ? img : img_loc.replace("{image}",img))}" alt="${img_alt}" class="item-image">
                            <div class="item-text">
                                <h1>${title}: ${item_text}</h1>
                                <h2>Ejercicios</h2>
                                ${process_ejercicios}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End of nested accordion -->
    `;
    return nestedAccordionHTML;
}

class Member {
    constructor(name, position, image, ejercicios_php){
        this.name = name;
        this.position = position;
        this.image = image;
        this.ejercicios_php = ejercicios_php;
    }
}

const team = [
    new Member('Aldo', 'Siempre trae pre', 'aldo', []),
    new Member('Leo', 'El couch', 'leo', []),
    new Member('Toño', 'El estético', 'tonio', []),
    new Member('Luis', 'El web-dev', 'luis', []),
    new Member('Fer', 'El otra-cosa-dev', 'fer', ["vectores1"]),
]

const fix_php = () => {
    if(this.phpSupport){
        console.info("PHP Supported, all PHP hrefs are fine");
    }
    else {
        let bodyContent = document.body.innerHTML;
        bodyContent = bodyContent.replace(/href="[^"]*"/g, 'href="#"');
        const tempDiv = document.createElement('div');
        tempDiv.innerHTML = bodyContent;
        document.body.innerHTML = tempDiv.innerHTML;
        console.warn("PHP NOT Supported, all PHP hrefs changed to # links");
    }
}

document.addEventListener('DOMContentLoaded', function () {
    setTimeout(() => {
        const element = document.getElementById('team-body');
    
        team.forEach(mem => {
            element.innerHTML += getNestedAccordion(
                mem.name, mem.image, 
                `Imagen de ${mem.name}`, mem.position,
                mem.ejercicios_php
                );
        })
        fix_php()
    }, 2000)
});