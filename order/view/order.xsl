<?xml version="1.0" encoding="UTF-8"?>

<xsl:stylesheet xmlns:xsl="http://www.w3.org/1999/XSL/Transform" 
                version="1.0">
    <xsl:output method="html"/>

    <xsl:template match="/">
        <html>
        
            <head>
                <title>Order History</title>
                <!-- Latest compiled and minified CSS -->
                <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous" />

                <!-- Latest compiled and minified JavaScript -->
                <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
            
            </head>
            
            <body class="container">
                
                <br/>
                <a href="../../view/customer/CustomerMainPage.php">Home</a>  
                <br/>
                <h2>Customer Order History</h2>
                <br/>
                <br/>
        
                <xsl:for-each select="orders/order">
        
                    <h4>Order ID : <xsl:value-of select="order_id" /></h4>
                    <h4>Order Date : <xsl:value-of select="order_date" /></h4>
                    <h4>Order Amount : <xsl:value-of select="total_amount" /></h4>
                    <h4>Status : <xsl:value-of select="status" /></h4>
                    <table class="table table-condensed table-bordered" style="font-size:16">
                        <tr>
                            <th>Order List ID</th>
                            <th>Flower ID</th>
                            <th>Flower Name</th>
                            <th>Unit Price</th>
                            <th>Quantity</th>
                            <th>Subtotal</th>
                        </tr>
          
                        <xsl:for-each select="orderlist">
                            <tr>
                                <td>
                                    <xsl:value-of select="orderlistID" />
                                </td>
                                <td>
                                    <xsl:value-of select="productID" />
                                </td>
                                <td>
                                    <xsl:value-of select="productName" />
                                </td>
                                <td>
                                    <xsl:value-of select="unitPrice" />
                                </td>
                                <td>
                                    <xsl:value-of select="quantity" />
                                </td>
                                <td>
                                    <xsl:value-of select="subtotal" />
                                </td>
                            </tr>
                        </xsl:for-each>
                    </table>   
                    <br/>
                </xsl:for-each>    
            </body>
        </html>
    </xsl:template>

</xsl:stylesheet>