const table = document.querySelector("#allstocks");

fetch("https://dev.kwayisi.org/apis/gse/equities")
  .then((response) => response.json())
  .then((data) =>
    data.forEach((stock) => {
      fetch(`https://dev.kwayisi.org/apis/gse/equities/${stock.name}`)
        .then((response2) => response2.json())
        .then((stockelement) => {
          table.innerHTML += `<tr><td>${stockelement.name}</td><td><a href='https://${stockelement.company.website}' target='_blank'>${stockelement.company.name}</a></td><td><a href='mailto:${stockelement.company.email}'>${stockelement.company.email}</a></td><td class="table-row-industry">${stockelement.company.industry}</td><td>${stockelement.capital}</td><td>${stockelement.shares}</td><td class='stock-price'>${stockelement.price}</td><td><a href="stockindex.php?symbol_to_insert=${stockelement.name}"><img class="action-button" src="./Assets/add.png" alt="img"></a></td></tr>`;
        });
    })
  );
