<?xml version="1.0" encoding="UTF-8"?>

<xsl:stylesheet xmlns:xsl="http://www.w3.org/1999/XSL/Transform" 
                version="1.0">
    <xsl:output method="html"/>

    <xsl:template match="/">
        <html>
            <head>
                <title>Catalog</title>                
            </head>
            <link rel="stylesheet" href="css/table.css"/>            
            <body>
                <h1 style="text-align:center">Catalog's database</h1>
        
                <table border="1">
                    <thead>
                        <tr>
                            <th>Catalog ID</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Date Created</th>
                            <th>Date Expire</th>
                            <th>Products</th>
                            <th>Total products</th>
                        </tr>
                    </thead>
                    <tbody>
                        <xsl:for-each select="catalogs/catalog">
                            <tr>
                                <td>
                                    <xsl:value-of select="catalog_id" />
                                </td>
                                <td>
                                    <xsl:value-of select="name" />
                                </td>
                                <td>
                                    <xsl:value-of select="description" />
                                </td>
                                <td>
                                    <xsl:value-of select="date_created" />
                                </td>
                                <td>
                                    <xsl:value-of select="date_expired" />
                                </td>
                                <td>
                                    <xsl:value-of select="products" />                   
                                </td>
                                <td>                                  
                                    <xsl:value-of select="total_product" />
                                </td>
                            </tr>
                        </xsl:for-each>
                    </tbody>
                </table>
                <xsl:variable name="latest">
                    <xsl:for-each select="catalogs/catalog">
                        <xsl:sort select="date_created" order="descending" />
                        <xsl:if test="position() = 1">
                            <xsl:value-of select="date_created"/>&#160;with product id:
                            <xsl:value-of select="catalog_id"/>
                        </xsl:if>
                    </xsl:for-each>
                </xsl:variable>
               <xsl:variable name="expired">
                    <xsl:for-each select="catalogs/catalog">
                        <xsl:sort select="date_expired" order="descending" />
                        <xsl:if test="position() = 1">
                            <xsl:value-of select="date_expired"/>&#160;with product id:
                            <xsl:value-of select="catalog_id"/>
                        </xsl:if>
                    </xsl:for-each>
                </xsl:variable>
                <p>
                    Total of catalog in database is <xsl:value-of select="count(//catalog)"/> item(s).
                    <br/>
                    Latest created item is <xsl:value-of select="$latest"/>  .<br/>
                    The latest item is expired is <xsl:value-of select="$expired"/>  .<br/>
                </p>     
            </body>
        </html>
    </xsl:template>

</xsl:stylesheet>
