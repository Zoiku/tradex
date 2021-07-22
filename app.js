const allstocks_table = document.querySelector("#home-table");

fetch("https://dev.kwayisi.org/apis/gse/equities")
  .then((response) => response.json())
  .then((data) =>
    data.forEach((stock) => {
      fetch(`https://dev.kwayisi.org/apis/gse/equities/${stock.name}`)
        .then((response2) => response2.json())
        .then(stockelement => {
          allstocks_table.innerHTML += `<tr><td>${stockelement.name}</td><td><a href='https://${stockelement.company.website}' target='__blank'>${stockelement.company.name}</a></td><td><a href='mailto:${stockelement.company.email}'>${stockelement.company.email}</a></td><td class="table-row-industry">${stockelement.company.industry}</td><td>${stockelement.capital}</td><td>${stockelement.shares}</td><td c;as>${stockelement.price}</td></tr>`;
        });
    })
  );