# PVModern Dashboards and Payments

## Routes

- `/news` - technology-first news dashboard.
- `/weather` - weather dashboard with city search, geolocation and unit switching.
- `/currency` - currency dashboard.
- `/currency-rate` - legacy alias page for the currency dashboard.
- `/order-tracking` - simplified shipment lookup dashboard.

## API Endpoints

Frontend pages call Magento server-side endpoints so provider keys are not exposed in browser code.

- `/pvmodern/api/news?category=technology&page=1&q=&region=global&sort=latest`
- `/pvmodern/api/weather?city=Hanoi&unit=metric`
- `/pvmodern/api/currency?mode=latest`
- `/pvmodern/api/currency?mode=convert&from=USD&to=VND&amount=100`
- `/pvmodern/api/currency?mode=history&range=1M`
- `/pvmodern/payments/create`
- `/pvmodern/payments/status?payment_id=...`
- `/pvmodern/payments/webhook`

Magento aliases under `/api/api/*` are also available for the dashboard APIs.

## Environment Variables

Set provider credentials in the web server/PHP-FPM environment or Magento deployment environment.

### News

- `NEWS_API_KEY`
- `NEWS_API_BASE_URL` default: `https://newsapi.org/v2`

If `NEWS_API_KEY` is missing or the provider fails, the UI falls back to local normalized technology content and still shows loading/error states.

### Weather

- `WEATHER_API_KEY` or `OPENWEATHER_API_KEY`
- `WEATHER_API_BASE_URL` default: `https://api.openweathermap.org`

OpenWeather data is fetched server-side and normalized for the storefront. If credentials are missing, the endpoint returns a safe reference fallback.

### Currency

Currency uses Frankfurter as a no-key reference provider where possible. VND pairs fall back to local reference rates if the provider cannot serve the pair.

- `CURRENCY_API_KEY` optional for a paid realtime FX provider
- `CURRENCY_API_BASE_URL` optional provider URL

Do not label rates as tick-by-tick realtime unless the configured provider actually supports realtime FX data.

### MoMo / VNPay Live Payments

Live payment URLs and QR codes require real merchant credentials and `PVMODERN_PAYMENT_MOCK=0`.

MoMo:

- `MOMO_ENDPOINT`
- `MOMO_PARTNER_CODE`
- `MOMO_ACCESS_KEY`
- `MOMO_SECRET_KEY`
- `MOMO_REDIRECT_URL`
- `MOMO_IPN_URL`
- `MOMO_REQUEST_TYPE` default: `captureWallet`

VNPay:

- `VNPAY_PAYMENT_URL`
- `VNPAY_TMN_CODE`
- `VNPAY_HASH_SECRET`
- `VNPAY_RETURN_URL`
- `VNPAY_LOCALE` default: `vn`

Without these credentials the checkout remains in safe mock/pending mode. It may render a scannable test QR payload, but it will not mark an order as paid from the frontend.

## Security Notes

- API keys and payment secrets must stay server-side.
- Payment status must be verified by webhook/callback or status polling.
- The frontend must never set an order as paid.
- Provider webhook signatures must be verified before updating order/payment status.
