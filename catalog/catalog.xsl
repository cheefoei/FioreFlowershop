<?xml version="1.0" encoding="UTF-8"?>

<xsl:stylesheet xmlns:xsl="http://www.w3.org/1999/XSL/Transform" 
  version="1.0">
  <xsl:output method="html"/>

  <xsl:template match="/">
    <html>
      <head><title>Catalog</title></head>
      <body>
        <h1>Catalog's database</h1>
        
        <table border="1">
          <tr><th>Catalog ID</th><th>Name</th><th>Description</th><th>Date Created</th><th>Date Expire</th></tr>
          
          <xsl:for-each select="catalogs/catalog">
            <tr>
              <td><xsl:value-of select="catalog_id" /></td>
              <td><xsl:value-of select="name" /></td>
              <td><xsl:value-of select="description" /></td>
              <td><xsl:value-of select="date_created" /></td>
              <td><xsl:value-of select="date_expired" /></td>
            </tr>
          </xsl:for-each>
        </table>       
      </body>
    </html>
  </xsl:template>

</xsl:stylesheet>
