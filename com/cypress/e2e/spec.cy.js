describe('empty spec', () => {
 

  it('passes', () => {
     
     var i = 0;
    for (i = 0; i < 100 ; i++) { 
    cy.visit("https://www.wecanda.com/beaute-et-soins/");
    
    
    cy.solveGoogleReCAPTCHA();
     cy.wait(7000);
     cy.on("uncaught:exception", (err, runnable) => {});
    cy.get('[type="radio"]').check("485", { force: true });
   
    cy.on("uncaught:exception", (err, runnable) => {});
    cy.get(".basic-vote-button").click({ force: true });
    }
    cy.on("uncaught:exception", (err, runnable) => {});
  })
})

