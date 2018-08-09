<?xml version="1.0" encoding="UTF-8"?>

<!--
    Namw: Leong Chee Foei
    Group: G6
-->

<xsl:stylesheet xmlns:xsl="http://www.w3.org/1999/XSL/Transform" version="1.0">
    <xsl:output method="html"/>

    <xsl:template match="/">
        <html>
            
            <head>
                <title>Flora Flowershop - Customer Invoice</title>
                
                <!-- Latest compiled and minified CSS -->
                <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous" />

                <!-- Latest compiled and minified JavaScript -->
                <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
            
            </head>
            
            <body class="container">

                <br/>
                <a href="CustomerMainPage.php">Home</a>  
                <br/>
                <h2>Customer Invoice Detail</h2>
                <br/>
                <br/>
                
                <table class="table table-condensed" style="font-size:16">
                    <tbody>
                        <xsl:for-each select="invoices/invoice">
                            <tr>
                                <td class="col-sm-4">
                                    <strong>Customer ID:   </strong>
                                    <xsl:value-of select="customerID" />
                                </td>
                                <td class="col-sm-4">
                                </td>
                                <td class="col-sm-4">
                                    <strong>Month/Year:   </strong>
                                    <xsl:value-of select="month" />
                                    <xsl:text> </xsl:text>
                                    <xsl:value-of select="year" />
                                </td>
                            </tr>
                            <tr>
                                <td class="col-sm-4">
                                    <strong>Customer Name:   </strong>
                                    <xsl:value-of select="customerName" />
                                </td>
                                <td class="col-sm-4">
                                </td>
                                <td class="col-sm-4">
                                    <strong>Date Created:   </strong>
                                    <xsl:value-of select="createdDate" />
                                </td>
                            </tr>
                            <tr>
                                <td class="col-sm-4">
                                    <strong>Invoice Number:   </strong>
                                    <xsl:value-of select="@invoiceID" />
                                </td>
                                <td class="col-sm-4">
                                </td>
                                <td class="col-sm-4">
                                    <strong>Status:   </strong>
                                    <xsl:value-of select="status" />
                                </td>
                            </tr>
                        </xsl:for-each>
                    </tbody>
                </table>
                <table class="table table-striped table-bordered table-condensed" style="font-size:16">
                    <thead>
                        <tr>
                            <th>Order ID</th>
                            <th>Order Date</th>
                            <th>Product Name</th>
                            <th>Unit Price (RM)</th>
                            <th>Quantity</th>
                            <th>Total Amount (RM)</th>
                        </tr>
                    </thead>
                    <tbody>
                        <xsl:for-each select="invoices/invoice/order">
                            <tr>
                                <td>
                                    <xsl:value-of select="orderID" />
                                </td>
                                <td>
                                    <xsl:value-of select="orderDate" />
                                </td>
                                <td>
                                    <xsl:value-of select="productName" />
                                </td>
                                <td>
                                    <xsl:value-of select="price" />
                                </td>
                                <td>
                                    <xsl:value-of select="quantity" />
                                </td>
                                <td>
                                    <xsl:value-of select="totalAmount" />
                                </td>
                            </tr>
                        </xsl:for-each>
                        <tr></tr>
                        <tr>
                            <td>
                            </td>
                            <td>
                            </td>
                            <td>
                            </td>
                            <td>
                            </td>
                            <td>
                                Invoice Amount (RM):
                            </td>
                            <th>
                                <xsl:value-of select="invoices/invoice/invoiceTotalAmount" />
                            </th>
                        </tr>
                    </tbody>
                </table>
                
            </body>
        </html>
    </xsl:template>

</xsl:stylesheet>
