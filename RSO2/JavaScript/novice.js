    
    
    let currentPage = 0;
    const itemsPerPage = 4;
    const newsItems = document.querySelectorAll(".novica");
    const prevButton = document.getElementById("prev");
    const nextButton = document.getElementById("next");
    function showPage(page) {
        let start = page * itemsPerPage;
        let end = start + itemsPerPage;
            // Skrij vse novice
            newsItems.forEach((item, index) => {
                item.style.display = (index >= start && index < end) ? "block" : "none";
            });

            // Omogoči/onemogoči gumbe
            prevButton.disabled = page === 0;
            nextButton.disabled = end >= newsItems.length;
    }
    nextButton.addEventListener("click", () => {
                if ((currentPage + 1) * itemsPerPage < newsItems.length) {
                    currentPage++;
                    showPage(currentPage);
                }
        });
    prevButton.addEventListener("click", () => {
            if (currentPage > 0) {
                currentPage--;
                showPage(currentPage);
            }
    });
    // Prikaži prvo stran
    showPage(currentPage);